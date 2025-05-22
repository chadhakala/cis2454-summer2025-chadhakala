
<?php
$hourly_wage = htmlspecialchars(filter_input(INPUT_GET, 'hourly_wage',FILTER_VALIDATE_FLOAT));
$hours_week = htmlspecialchars(filter_input(INPUT_GET, 'hours_week', FILTER_VALIDATE_INT));
$est_tax = htmlspecialchars(filter_input(INPUT_GET, 'est_tax', FILTER_VALIDATE_FLOAT));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset ="utf-8" dir="ltr">
        <title>Wage Calculator</title>
    </head>
    <body>
        <?php
        
        if ($hours_week > 40) {
            $overtime_hours = $hours_week - 40;
            $regular_hours = 40;
            $overtime_pay = $overtime_hours * $hourly_wage * 1.5;
        } else {
            $regular_hours = $hours_week;
        }
        
      
        $regular_pay = $regular_hours * $hourly_wage;
        
        //calculate gross income
        $gross_income = $regular_pay + $overtime_pay;
        
        //calculate taxes
        $taxes_paid = $gross_income * ($est_tax / 100);
        
        //calculate net pay
        $net_pay = $gross_income - $taxes_paid;
        ?>

    
       
        <main>
            <h1>Wage Calculator--Wage Calculator</h1>
                <form action="index.php" method="get">
                    <label>Hourly Wage</label><br>
                    <input type="text" name="hourly_wage"/><br>
                    <label>Hours worked this week</label><br>
                    <input type="text" name="hours_week"/><br>
                    <label>Estimated tax rate</label><br>
                    <input type="text" name="est_tax"/>
                    <label>&nbsp;</label><br>
                    <input type="submit" value="Submit"/>
                </form>
        </main>
        <div>
            <?php 
            echo "Gross Pay:   $gross_income";?><br>
            <?php
            echo "Net Pay:   $net_pay";?><br>
            <?php
            echo "tax Paid:  $taxes_paid";?><br>
            
            
            
            
        </div>
    </body>
</html>
