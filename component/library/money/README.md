# ZF2 Money Module

A Zend Framework 2 module intended to make it easier to work with money.

Essentially, this module imports [Sebastian Bergmann's Money Library](https://github.com/sebastianbergmann/money) but probably controversially doesn't use it as a dependency with composer etc. The reason for this in the first instance was to get access to private static member vars in `Currency` but in future I will likely want to modify the basic value objects more.

It's important to note that the Money value object stores the amount as an integer, the given currencies' smallest unit.

## Available Components

### Currency List

The currency list is intended to provide an easy way to configure the ISO currencies your app would be limited to using/accepting/whatever. A simple object that's retrievable form the service locator with `'WellCart\Money\Service\CurrencyList'`. Take a look in `module.config.dist.php` for more info on configuration.

There's a handy intializer you can bung into any of your service configurations under the initializers key for form elements, validators etc. Just add the class name to your module method or config file.

	public function getFormElementConfig() {
		return array(
			'initializers' => array(
				'WellCart\Money\Factory\CurrencyListInitializer',
			),
		);
	}

The initializer is not registered by default anywhere. All the instances in this module that use it have factories that supply it manually.

### Currency Code Validator

Validates basic code format and also uses the currency list service to exclude codes that are not 'allowed' or unknown

### Currency Select Element

A select element that should be retrieved via the `FormElementManager` if you want it's validator and list of available currencies to all point to the same currency list.

Within your form elememt config, you should be able to specify `'type' => 'SelectCurrency'` - A `CurrencyCode` validator will automatically be added to it.

### Money Fieldset

A fieldset that will accept or hydrate to an instance of `WellCart\Money\Money\Money`. If you have a look at the tests you'll find an example of binding a model to a form that that hydrates the money instance.

### Default Locale Initializer

As the fieldset should be able to convert arbitrary localized numbers to something useful, i.e. in UK, 1,234.56 is 1234.56 and in DE, 1.234,56 - there's a locale initializer that provides either a configured default locale or the one found in `Locale::getDefault()`

### View Helpers

#### moneyFormat()

Largely based on `Zend\I18n\View\Helper\CurrencyFormat`, but the parameters have been changed:
	
	$money = new Money(123456, new Currency('GBP'));
	echo $this->moneyFormat($money); // £1,234.56 (Assuming default locale of en_GB)
	echo $this->moneyFormat($money, 'de_DE'); // 1.234,56 £
	echo $this->moneyFormat($money, 'de_DE', false); // 1.234 £
	
You can also specify custom format patterns - look at NumberFormatter docs for more info.
