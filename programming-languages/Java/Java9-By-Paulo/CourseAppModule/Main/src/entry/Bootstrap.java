package entry;

import database.Course;
import database.CourseServer;

import java.util.List;

public class Bootstrap {
    public static void main(String[] args) {
        CourseServer courseServer = new CourseServer();
        List<Course> list = courseServer.getCourses();
        for(Course c: list){
            System.out.println(c.toString());
        }

    }
}
