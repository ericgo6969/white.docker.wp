<?php
/**
 * @license MIT
 *
 * Modified using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

declare(strict_types=1);

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2018-2020 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace iThemesSecurity\Strauss\CBOR\Tag;

use iThemesSecurity\Strauss\CBOR\ByteStringObject;
use iThemesSecurity\Strauss\CBOR\CBORObject;
use iThemesSecurity\Strauss\CBOR\IndefiniteLengthByteStringObject;
use iThemesSecurity\Strauss\CBOR\IndefiniteLengthTextStringObject;
use iThemesSecurity\Strauss\CBOR\Tag;
use iThemesSecurity\Strauss\CBOR\TextStringObject;
use iThemesSecurity\Strauss\CBOR\Utils;

final class Base64UrlEncodingTag extends Tag
{
    public static function getTagId(): int
    {
        return self::TAG_ENCODED_BASE64_URL;
    }

    public static function createFromLoadedData(int $additionalInformation, ?string $data, CBORObject $object): Tag
    {
        return new self($additionalInformation, $data, $object);
    }

    public static function create(CBORObject $object): Tag
    {
        [$ai, $data] = self::determineComponents(self::TAG_ENCODED_BASE64_URL);

        return new self($ai, $data, $object);
    }

    /**
     * @deprecated The method will be removed on v3.0. Please rely on the CBOR\Normalizable interface
     */
    public function getNormalizedData(bool $ignoreTags = false)
    {
        if ($ignoreTags) {
            return $this->object->getNormalizedData($ignoreTags);
        }

        if (! $this->object instanceof ByteStringObject && ! $this->object instanceof IndefiniteLengthByteStringObject && ! $this->object instanceof TextStringObject && ! $this->object instanceof IndefiniteLengthTextStringObject) {
            return $this->object->getNormalizedData($ignoreTags);
        }

        return Utils::decode($this->object->getNormalizedData($ignoreTags));
    }
}
