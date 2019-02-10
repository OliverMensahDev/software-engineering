public class Anonymous {
  private String name;
  private int uniLevel;
  
  public void setName(String name){
    this.name = name;
  }
  
  public String getName(){
    return this.name;
  }
  
  private  class RewardProgram {
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
  
  private RewardProgram rewardProgram = new RewardProgram();
  
  public static void main(String[] args){
    Anonymous an = new Anonymous();
    an.rewardProgram.setLevel(3);
    System.out.println(an.rewardProgram.getLevel());
    
  }
  
}