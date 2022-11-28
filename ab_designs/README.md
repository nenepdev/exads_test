Developing Environment:
- php with laravel framework + xampp + php artisan + mysql db

Aproach:
get request ----> web routes ---> controller with logic to decide design ----> returns view with design/bad response

To decide design, based on it's split percents:
I decided first to get a random number between 1 and 100, using rand() function from php. 
And then, go through each design to understand wich one it is, based on the given random number. For example
design a - 50, design b - 25, design c - 25: 
- if the random number is between [1,50] the design should be A
- if the random number is between [51,75] the design should be B
- if the random number is between [76,100] the design should be C
In this way I can guarantee that the split percentages are respected.

To start of:
- you need laravel, xampp and composer
- to start serving the app: php artisan serve


*************************************************| WEB route Doc |*************************************************

[get] /exads - shows one of promotion's 1 designs, based on data from https://packagist.org/packages/exads/ab-test-data

Responses:
200 - Showing design designName
500 - Something went wrong! Couldn't decide design. 
500 - Something went wrong! Empty designs. 




