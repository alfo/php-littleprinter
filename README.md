PHP-LittlePrinter
=================

PHP-LP is an open source framework designed to make writing a publication for the Little Printer by BERG as easy as possible.

Note: the only thing new file you have to create is a `.png` icon, which should be monochrome and 55px by 55px.

What this framework does for you
--------------------------------

When you define configuration in the `config.php`, the `meta.json` endpoint is automatically generated.

But, as well as that, if you have defined user configuration (things they need to define when they subscribe to your publication), the `/validate_config/` endpoint dynamically checks the submitted data to see whether or not it meets the criteria in the `config.php`.

It also provides an easy framework for including headers and footers in your publication.

Configuration
-------------

There is very little configuration needed. Here are the only things you need to change.

###config.php

This is where you set all the options for your publication. You need to fill out:

* `owner_email` - your email
* `name` - your publicaton's title
* `description` - a description of your publication
* `delivered_on` - a string like 'every day' or 'every tuesday' or '3rd of the month'
* `send_timezone_info` - whether or not BERGCloud should send an ISO 8601 timestamp
* `send_delivery_count` - send the number of deliveries so far
* Finally, any configuration fields you need for your publicaton. Some examples are given in the `config.php`.<br><br>There are some advanced methods of validating your user input, such as min and max length of text input, and testing strings against regex.

###header.php

The HTML that will be printed before the main content of your publication.

###footer.php

Automatically included at the bottom of your edition and sample, like the header.

###style.css

A place to put all the styles you need to make your publication awesome.

###functions.php

This is where you should put any functions that you need throughout your publication. This is also where you should put database connect scripts if you need to, because it is included in every endpoint.

###configure/index.php

Do you need external configuration for your publication, such as using a third party API and token system?

If so, put any API code in this script.

Refer to the BERGCloud documentation for any help.

###edition/index.php

This is where you put all the code for your regular edition - the thing that will be printed every day when someone subscribes to your publication.