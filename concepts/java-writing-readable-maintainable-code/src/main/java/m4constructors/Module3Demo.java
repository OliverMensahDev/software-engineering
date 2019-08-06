package m4constructors;

import java.util.Date;
import java.util.GregorianCalendar;
import java.util.Locale;
import java.util.TimeZone;

public class Module3Demo {

    public static void main(String[] args) {


        // DIY
        new GregorianCalendar(new TimeZone() {
            @Override
            public int getOffset(int era, int year, int month, int day, int dayOfWeek, int milliseconds) {
                return 0;
            }

            @Override
            public void setRawOffset(int offsetMillis) {

            }

            @Override
            public int getRawOffset() {
                return 0;
            }

            @Override
            public boolean useDaylightTime() {
                return false;
            }

            @Override
            public boolean inDaylightTime(Date date) {
                return false;
            }
        }, new Locale("en", "", ""));



        // Using a static factory method
        GregorianCalendar.getInstance();
    }
}
