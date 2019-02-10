package database;

import java.util.ArrayList;
import java.util.List;

public class CourseServer {

    public List<Course> getCourses(){
         List arrayList = new ArrayList();
         for(int i = 0; i < 10; i++){
             Course course = new Course();
             course.setCourseName("Course "+ i);
             course.setCourseAuthor("Author "+ i);
             arrayList.add(course);
         }
         return arrayList;
    }
}
