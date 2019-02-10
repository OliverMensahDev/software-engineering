public class Inner {
  private String name;
  public void setName(String name){
    this.name = name;
  }
  
  public String getName(){
    return this.name;
  }
  
// others members elided for clarity
  public static class RewardProgram {
    private int memberLevel;
    private int memberDays;
    
    public int getLevel() { 
      return memberLevel; 
    }
    public void setLevel(int level) { 
      this.memberLevel = level;
    }
    public int getMemberDays() {
      return memberDays; 
    }
    public void setMemberDays(int days) { 
      this.memberDays = days;
    }
  }
  
  
  //private RewardProgram rewardProgram = new RewardProgram();
  
//  public RewardProgram getRewardProgram() {
//    return  new RewardProgram();
//  }
  
  
  private RewardProgram rewardProgram = new RewardProgram();
  public RewardProgram getRewardProgram() {
    return  rewardProgram;
  }
  
  
  public static void main(String[] args){
    
    Inner steve = new Inner();
    steve.setName("Steve");
    steve.getRewardProgram().setLevel(3);
    steve.getRewardProgram().setMemberDays(180);
    System.out.println(steve.getRewardProgram().getMemberDays());
    
    System.out.println(steve.getRewardProgram().getLevel());
    System.out.println(steve.getName());
    
    
    Inner.RewardProgram platinum = new Inner.RewardProgram();
    platinum.setLevel(3);
    if(steve.getRewardProgram().getLevel() == platinum.getLevel())
      System.out.println("Steve is platinum");
  }
  
}