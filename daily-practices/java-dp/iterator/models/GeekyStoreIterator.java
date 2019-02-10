package iterator.models;

import iterator.Product;

import java.util.ArrayList;
import java.util.Iterator;

public class GeekyStoreIterator implements Iterator {
    ArrayList<Product> catalog;
    int position = 0;

    public GeekyStoreIterator(ArrayList<Product> catalog) {
        this.catalog = catalog;
    }

    @Override
    public boolean hasNext() {
        if (position >= catalog.size() || catalog.get(position) == null) {
            return false;

        }else return true;
    }

    @Override
    public Object next() {
        Product product = catalog.get(position);
        position = position + 1;

        return product;
    }
}
