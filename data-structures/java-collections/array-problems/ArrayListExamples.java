import java.util.ArrayList;
import java.util.List;

public class ArrayListExamples
{
    public static void main(String[] args)
    {
        Product door = new Product("Wooden Door", 35);
        Product floorPanel = new Product("Floor Panel", 25);
        Product window = new Product("Glass Window", 10);

        List<Product> products = new ArrayList<>();
        products.add(door);
        products.add(floorPanel);

        System.out.println(products);

        // Lists auto-resize, with add method
        products.add(window);

        System.out.println(products);

        // We can query for size
        System.out.println(products.size());

        // Lists have order, we retrieve elements by index
        for (int i = 0; i < products.size(); i++)
        {
            // Generic get method
            Product product = products.get(i);
            System.out.println(product);
        }

        // can loop over them with a for loop
        for (Product product : products)
        {
            System.out.println(product);
        }

        // Can still add duplicates though
        products.add(window);
    }
}