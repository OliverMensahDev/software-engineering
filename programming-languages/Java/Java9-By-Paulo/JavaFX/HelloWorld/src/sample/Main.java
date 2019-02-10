package sample;

import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;

public class Main extends Application {

    @Override
    public void start(Stage primaryStage) throws Exception{
        // create uI
        Button button = new Button();
        button.setText("HelloWorld Button Click");
        button.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                System.out.println("Hello World");
            }
        });

        //create a root
        StackPane root = new StackPane();
        // add element to root
        root.getChildren().add(button);
        //create scene
        Scene scene = new Scene(root, 400, 500);
        //add scene to window
        primaryStage.setScene(scene);
        primaryStage.setTitle("HelloWorld");
        //show
        primaryStage.show();


    }


    public static void main(String[] args) {
        launch(args);
    }
}
