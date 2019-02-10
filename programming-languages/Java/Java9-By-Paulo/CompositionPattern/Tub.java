public class Tub{
    private String name;
    private Bubble bubble;
    
    public Tub(String name){
        this.name = name;
        this.bubble = new Bubble();
        System.out.println(name);
    }
}