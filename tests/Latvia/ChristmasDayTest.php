<?php

/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2019 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace Yasumi\tests\Latvia;

use Yasumi\Holiday;
use Yasumi\tests\YasumiTestCaseInterface;

/**
 * Class containing tests for Christmas day in Latvia.
 *
 * @author Gedas Lukošius <gedas@lukosius.me>
 */
class ChristmasDayTest extends LatviaBaseTestCase implements YasumiTestCaseInterface
{
    /**
     * The name of the holiday to be tested
     */
    public const HOLIDAY = 'christmasDay';

    /**
     * @return array
     * @throws \Exception
     */
    public function holidayDataProvider(): array
    {
        return $this->generateRandomDates(12, 25, self::TIMEZONE);
    }

    /**
     * @dataProvider holidayDataProvider
     *
     * @param int       $year
     * @param \DateTime $expected
     *
     * @throws \ReflectionException
     */
    public function testHoliday($year, \DateTime $expected)
    {
        $this->assertHoliday(self::REGION, self::HOLIDAY, $year, $expected);
    }

    /**
     * {@inheritdoc}
     * @throws \ReflectionException
     */
    public function testTranslation()
    {
        $this->assertTranslatedHolidayName(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(),
            [self::LOCALE => 'Ziemassvētki']
        );
    }

    /**
     * {@inheritdoc}
     * @throws \ReflectionException
     */
    public function testHolidayType()
    {
        $this->assertHolidayType(self::REGION, self::HOLIDAY, $this->generateRandomYear(), Holiday::TYPE_OFFICIAL);
    }
}
