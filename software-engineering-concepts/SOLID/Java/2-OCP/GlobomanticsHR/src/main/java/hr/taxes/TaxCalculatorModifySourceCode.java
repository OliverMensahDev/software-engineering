package hr.taxes;

import hr.personnel.Employee;
import hr.personnel.FullTimeEmployee;
import hr.personnel.Intern;
import hr.personnel.PartTimeEmployee;

public class TaxCalculatorModifySourceCode {
    private final int RETIREMENT_TAX_PERCENTAGE = 10;
    private final int INCOME_TAX_PERCENTAGE = 16;
    private final int BASE_HEALTH_INSURANCE = 100;


    // Change in Requirement = Requirement version 1
    public double calculate(Employee employee) {
        int monthlyIncome = employee.getMonthlyIncome();
        if(employee instanceof FullTimeEmployee){
            return BASE_HEALTH_INSURANCE +
                    (monthlyIncome * RETIREMENT_TAX_PERCENTAGE) / 100 +
                    (monthlyIncome * INCOME_TAX_PERCENTAGE) / 100;
        }
        if(employee instanceof PartTimeEmployee){
            return BASE_HEALTH_INSURANCE +
                    (monthlyIncome * 10) / 100 +
                    (monthlyIncome * INCOME_TAX_PERCENTAGE) / 100;
        }
        if(employee instanceof Intern){
            if(monthlyIncome < 350){
                return 0;
            }else{
                return  (monthlyIncome * INCOME_TAX_PERCENTAGE) / 100;
            }
        }
        return 0;
    }
}
