<?php

declare(strict_types=1);

namespace Faker\Rector;

use Faker\Generator;
use PhpParser\Node;
use PHPStan\Type;
use Rector\Rector;
use Symplify\RuleDocGenerator;

final class GeneratorPropertyFetchToMethodCallRector extends Rector\AbstractRector
{
    /**
     * @var list<string>
     */
    private array $deprecatedPropertyNames = [
        'address',
        'amPm',
        'asciify',
        'biasedNumberBetween',
        'boolean',
        'bothify',
        'buildingNumber',
        'century',
        'chrome',
        'city',
        'citySuffix',
        'colorName',
        'company',
        'companyEmail',
        'companySuffix',
        'country',
        'countryCode',
        'countryISOAlpha3',
        'creditCardDetails',
        'creditCardExpirationDate',
        'creditCardExpirationDateString',
        'creditCardNumber',
        'creditCardType',
        'currencyCode',
        'date',
        'dateTime',
        'dateTimeAD',
        'dateTimeBetween',
        'dateTimeInInterval',
        'dateTimeThisCentury',
        'dateTimeThisDecade',
        'dateTimeThisMonth',
        'dateTimeThisYear',
        'dayOfMonth',
        'dayOfWeek',
        'domainName',
        'domainWord',
        'e164PhoneNumber',
        'email',
        'emoji',
        'file',
        'firefox',
        'firstName',
        'firstNameFemale',
        'firstNameMale',
        'freeEmail',
        'freeEmailDomain',
        'getDefaultTimezone',
        'hexColor',
        'hslColor',
        'hslColorAsArray',
        'iban',
        'image',
        'imageUrl',
        'imei',
        'internetExplorer',
        'iosMobileToken',
        'ipv4',
        'ipv6',
        'iso8601',
        'jobTitle',
        'languageCode',
        'lastName',
        'latitude',
        'lexify',
        'linuxPlatformToken',
        'linuxProcessor',
        'localCoordinates',
        'localIpv4',
        'locale',
        'longitude',
        'macAddress',
        'macPlatformToken',
        'macProcessor',
        'md5',
        'month',
        'monthName',
        'msedge',
        'name',
        'numerify',
        'opera',
        'paragraph',
        'paragraphs',
        'passthrough',
        'password',
        'phoneNumber',
        'postcode',
        'randomAscii',
        'randomDigitNotNull',
        'randomElement',
        'randomElements',
        'randomHtml',
        'randomKey',
        'randomLetter',
        'realText',
        'realTextBetween',
        'regexify',
        'rgbColor',
        'rgbColorAsArray',
        'rgbCssColor',
        'rgbaCssColor',
        'safari',
        'safeColorName',
        'safeEmail',
        'safeEmailDomain',
        'safeHexColor',
        'sentence',
        'sentences',
        'setDefaultTimezone',
        'sha1',
        'sha256',
        'shuffle',
        'shuffleArray',
        'shuffleString',
        'slug',
        'streetAddress',
        'streetName',
        'streetSuffix',
        'swiftBicNumber',
        'text',
        'time',
        'timezone',
        'title',
        'titleFemale',
        'titleMale',
        'tld',
        'toLower',
        'toUpper',
        'unixTime',
        'url',
        'userAgent',
        'userName',
        'uuid',
        'windowsPlatformToken',
        'word',
        'words',
        'year',
    ];

    public function getNodeTypes(): array
    {
        return [
            Node\Expr\PropertyFetch::class,
        ];
    }

    public function getRuleDefinition(): RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new RuleDocGenerator\ValueObject\RuleDefinition(
            sprintf(
                'Replaces references to deprecated properties of %s with method calls',
                Generator::class,
            ),
            [
                new RuleDocGenerator\ValueObject\CodeSample\CodeSample(
                    <<<'CODE_SAMPLE'
$faker->address;
CODE_SAMPLE
                    ,
                    <<<'CODE_SAMPLE'
$faker->address();
CODE_SAMPLE
                ),
            ],
        );
    }

    /**
     * @param Node\Expr\PropertyFetch $node
     */
    public function refactor(Node $node): ?Node
    {
        $callerType = $this->getType($node->var);

        if (!$callerType instanceof Type\ObjectType) {
            return null;
        }

        if (!$callerType->isInstanceOf(Generator::class)->yes()) {
            return null;
        }

        if (!$node->name instanceof Node\Identifier) {
            return null;
        }

        $propertyName = $node->name->name;

        if (!in_array($propertyName, $this->deprecatedPropertyNames, true)) {
            return null;
        }

        return new Node\Expr\MethodCall(
            $node->var,
            new Node\Identifier($propertyName),
        );
    }
}
