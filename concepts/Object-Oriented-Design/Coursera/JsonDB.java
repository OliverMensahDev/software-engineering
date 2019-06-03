import java.net.*;
import java.util.*;

interface JsonDB{
  public void open(URL location);
  public void close();
  public HashMap<String, String> lookup(id)
