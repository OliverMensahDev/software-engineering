class Login<T> {
    private T username;
    private T password;
    public void login(T username, T password){
        System.out.println(username + " "+ password);
    }

    public static void main(String[] args) {
        Login<String> log = new Login();
        log.login("Oliver", "234234");
        
        Login<Integer> logInt = new Login();
        logInt.login(2, 3);
    }
}