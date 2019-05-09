# Agence Selection Test

#### Agence Selection Test Solution

###### Consultor Listed: 
List of consultors returned from database.

![Consultor Listed](https://user-images.githubusercontent.com/42616141/57425058-d8313b80-71e7-11e9-9013-c506638ffd18.png)

###### Consultors Selected: 
Each consultor selected is inserted in a list of selected consultors.

![Consultors Selected](https://user-images.githubusercontent.com/42616141/57425092-f139ec80-71e7-11e9-9a82-00c55d37f931.png)

###### Receitas Listed: 
After select the dates and the consultors, the user click on relatorio button and the receitas for each selected consultor are listed if the have records for the selected period.

![Receitas Listed](https://user-images.githubusercontent.com/42616141/57425107-0282f900-71e8-11e9-91c3-8cf3c363beb3.png)

###### Column Chart: 
After select the dates and the consultors, the user click on gráfico button and a chart representing the receitas for each selected consultor are represented if the have records for the selected period, additionally a line representing the average mid cost is added to show if the consultor performance is over the company costs.

![Column Chart](https://user-images.githubusercontent.com/42616141/57425123-1890b980-71e8-11e9-8860-5563b42dfa60.png)

###### Pie Chart: 
After select the dates and the consultors, the user click on pizza button and a chart representing the percentage of receitas for each selected consultor are represented if the have records for the selected period.

![Pie Chart](https://user-images.githubusercontent.com/42616141/57425142-27776c00-71e8-11e9-8169-baa5442cc6af.png)

###### Consultor without records: 
If a consultor is selected and there is no any record in the selected period, the app shows an alert indicating there's no record for the selectec consultor in the period selected.

![Consultor without records](https://user-images.githubusercontent.com/42616141/57425483-4e826d80-71e9-11e9-8d56-7479b0d08e7e.png)

###### Selected Dates Error: 
If a date from selected is geater than the to date, the app shows an alert indicating there's an error in the selected dates.

![Selected Dates Error](https://user-images.githubusercontent.com/42616141/57425503-60641080-71e9-11e9-875f-350c68661adb.png)


## Solution URL
* Link to the hosted application. [Url](https://testagence.ml)

## Requirements
* Laravel Framework for Backend
* VueJs for Frontend Components (Integrated with Laravel Blades)
* Based on Neptune Admin Dashboard

## Usage
1. Clone the repo in your local system
2. Install [Laravel Framework ](https://laravel.com/docs/5.8/installation)
3. Install backend dependencies ```composer install```
4. Install frontend dependencies ```npm install```
5. Server Up with executing command ```php artisan serve```
6. Select any Consultors listed

## Testing

Tests were created using PHPUnit in Laravel to test this:

1. WebSite is working fine
2. Consultors are listed
3. Consultors Receitas are returned from database
4. Column Chart data of Consultors receitas in the selected period are returned from database
5. Pie Chart data of Consultors receitas in the selected period are returned from database

To run tests execute commad ```vendor/bin/phpunit``` in your project root

## History
2019-05-08 - First public version

## Credits
- Developed by: Daniel Sánchez

## License
The MIT License (MIT)