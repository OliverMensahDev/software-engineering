package hr.main;

import hr.logging.ConsoleLogger;
import hr.persistence.EmployeeFileSerializer;
import hr.persistence.EmployeeRepository;
import hr.personnel.Employee;

import java.io.IOException;
import java.util.List;

public class SaveEmployeesMain {
    public static void main(String[] args) {
        ConsoleLogger logger = new ConsoleLogger();

        // Grab employees
        EmployeeRepository repository = new EmployeeRepository(new EmployeeFileSerializer());
        List<Employee> employees = repository.findAll();

        // Save all
        for (Employee e : employees){
            try {
                repository.save(e);
                logger.writeInfo("Saved employee " + e.toString());
            } catch (IOException ex) {
                logger.writeError("Saving employee", ex);
            }
        }
    }
}
