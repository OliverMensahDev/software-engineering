package m9tests;

import m5methods.Order;
import org.testng.annotations.Test;

import static m5methods.MethodWithTooManyArguments.nowPlusDays;
import static org.testng.Assert.assertEquals;

public class TestExamples {


    @Test
    public void basicMathTest(){

        assertEquals(2, 6/3);

        assertEquals(4, 2*2);
    }













    @Test
    public void divisionWorks(){
        assertEquals(2, 6/3);
    }

    @Test
    public void multiplicationWorks(){
        assertEquals(4, 2*2);
    }








    @Test
    public void testOrderExpirationData(){

        // Arrange
        long tomorrow = nowPlusDays(1);
        Order order = new Order();

        // Act
        order.setExpirationDate(tomorrow);

        // Assert
        assertEquals(order.getExpirationDate(), tomorrow);
    }

}
