<?php
/**
 * AmountDebet.php
 * Copyright (c) 2017 thegrumpydictator@gmail.com
 *
 * This file is part of Firefly III.
 *
 * Firefly III is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Firefly III is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Firefly III.  If not, see <http://www.gnu.org/licenses/>.
 */
declare(strict_types=1);

namespace FireflyIII\Import\Converter;

/**
 * Class AmountDebet
 */
class AmountDebet implements ConverterInterface
{
    /**
     * @param $value
     *
     * @return string
     */
    public function convert($value): string
    {
        /** @var ConverterInterface $converter */
        $converter = app(Amount::class);
        $result    = $converter->convert($value);
        $result    = app('steam')->positive($result);
        $result    = bcmul($result, '-1');

        return $result;
    }
}
