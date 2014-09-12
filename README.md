erdiko-payments
===============

Simple payment integration (currently uses braintree)


Version (SemVer)
----------------

0.1.0

Installation
------------

* To get the erdiko-drupal package.  To do this simply run this on the commandline

	composer require erdiko/payments 0.1.*

An alternative is to add payment module to your require list in your composer.json file and run, "composer update".


Demo
----

To add some sample demos to see erdiko/payments in action simply add these routes to your app.  Edit /app/config/application/routes.json and enter the routes below.  The demos will show up as yoursite.com/payments/braintree

	"/payments/": "\erdiko\payments\controllers\Payments",
	"/payments/:action": "\erdiko\payments\controllers\Payments",

FAQ
---

1. I found a bug, what do I do?

	Submit an issue, https://github.com/arroyolabs/erdiko-payments/issues

2. I want to contribute

	Please fork and submit a pull request or drop us a line.


**Thank you for playing with Erdiko**

