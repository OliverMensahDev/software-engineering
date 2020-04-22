# SOLID Software Design Principles
Learn how to apply the SOLID principles of object-oriented design to create a loosely coupled software systems that easy to change, test and maintain.


> Problems that appear when Solid Principles are not used.

> It is not enough for code to work -- Robert C Martin, Clean Code.
If every bug is extremely difficult to fix, if every change is very costly and code is unmaintainable nightmare. 

> This is where SOLID principles come to play. This is the foundation on which we cn build clean, maintainable architectures. 

> Couple of Examples where there is problem without SOLID 
*  App has many modules: Documents, Payment, Employees, Reporting, Persistence
- Change Request: add new payment method
 > As developers, we go to the payment module, make the change, deploy and after deployment we notice we have bugs in sub-systems(other modules); This is called Code Fragility, a term coined by Robert C Martin or Uncle Bob. 
 It is the tendency of the software to break in many places every time it is changed. 

- Change Request: Update Report with new data
 > We go to the reporting module, start implementing change, have to modify other parts of the system. This is another symptom of code that is not robust.  And it is called Code Rigidity; the tendency for software to be difficult to change , even in simple ways. Every change causes a cascade subsequent changes in dependent modules. 

>  Both are symptoms of high technical Debt.

Technical Debt is the silent killer of all software projects.  The cost of prioritizing fast delivery over code quality for long periods of time. 

> Controlling Technical Debt
Write code, pay debt(refactor - SOLID Principle, Design Patterns, Decoupled Components, test), 


## SOLID
> Acronym for 5 software design principles that helps us to keep technical debt under control.   
The 5 SOLID principles are: 
1. Single Responsibility Principle
2. Open Closed  Principle
3. Liskov Substitution Principle
4. Interface Segregation Principle
5. Dependency Inversion Principle

Understanding Solid Principle in theory is nothing but knowing how and when to apply them in real application is completely different stories. 
> Globomantics HR 
- Employee Management
- Tax Calculation
- Pay slip generation 
- Reporting 

### SRP
Understand SRP
Identify multiple reasons to change in your own codebase
Danger of having multiple responsibilities

States that every function, class or module should have one and only one reason to change. 

Responsibilities = Access of change
Examples: Business Logic, UI, Persistence, Logging, Orchestration(Component comm), Users.

One important habit you need to develop as a software developer is the ability to identify the reasons to change that your components have and reduce them to a single one.

> Tricks to identify multiple reasons to change
- If Statements are clear signs that there are multiple reasons to change
```js
if(employee.getMonthlyIncome() > 2000){
  //some logic 
}else {
  //some logic
}
```
- Switch Statements
each case represents one responsibility

- Monster Methods
Large number of lines of code, mix level of abstractions in the implementation, do more than expected 
```java
Income getIncome(Employee e){
  Income income = employeeRepository.getIncome(e.id);
  StateAuthorityApi.send(income, e.fullName);
  Payslip payslip = PayslipGenerator.get(income);
  JsonObject payslipJson = convertToJson(payslip)
  EmailService.send(e.emil, payslipJson);

  return income;
}
```

- God Class
A class with all helper methods doing different stuff
```java
class Utils
{
  void saveToDb(Object o){}
  void convertTOJson(Object o){}
  byte[] serialize(Object o){}
  void log(String msg){}
  int roundDoubleToInt(double val){}
}
```

- People 
method used by one actor can have a little bit of different

 > SRP Example
Well defined purpose
Names should be explicit
Functions should be inline with the purpose
```java
class ConsoleLogger
{
  void logInfo(String msg)
  {
    System.out.println(msg)
  }
  void logError(String msg, Exception e){}
}
```
> Dangers of Multiple Responsibilities
- Code is more difficult to read and reason about
- Decreased quality due to testing difficulty
- Side Effects - Lies of function indicating it has something but does other things internally 
- High Coupling
Coupling is the level of inter-dependency between various software components. 
It exposes the internal implementation of a particular class

> Refactoring 0Starter to SRP 
- Employee class has a save method with 3 responsibilities(serialization,file access, logging) and over coordination with try and catch block 
- Employee class is a business entity which means the save method should not be here since it deal with persistence
-Create classes for each responsibility and change the implementation of the save method
-Take orchestration(try/catch) to the caller

### Open Closed Principle (OCP)
> Evolving Code with the OCP 
Classes, functions, and modules should be closed for modification but open for extension 

> A class is closed for modification if each new feature to be be added does not require modify the existing  source code. The source code becomes immutable

> A class is open for extension if it is extendable to make it behave in new ways by writing new code

> Conceptual Example: 
Class A has B and C as dependency. If implementing a new feature in A by modifying the existing code, there is high risk of breaking B and C.  This causes rigidity.  In a real, application the dependency graph is much more complex and changes to sub-structure will have ripple events on the system. 

A  better approach is to write the code in new class to reduce regression bugs. 

> OCP Implementation Strategies
- Inheritance
Coupling especially with concrete class

- Strategy Pattern
Extract functionality into interface(s)
Create classes that implements the interface
Factory to build the class based on a property 

- Which approach to choose
Progressively apply OCP 

### Liskov Substitution Principle(LSP)
Very useful for creating correct type hierarchies. 
It states that any object of type must be a substitutable by objects of a derived type without altering the correctness of the program.

Substitutable is all about relationship between types.
> Relationship is not is a relationship in object orientation. Instead we should ask ourselves; Is particular type substitutable by another type. Eg; Is the class rectangle fully substitutable by class square.

> Violations
- Empty Derived Methods or functions.
```java
class Bird
{
  public void fly(int altitude)
  {
    setAltitude(altitude);
    //fly logic
  }
}
class Ostrich extends Bird
{
  @Override public void fly(int altitude)
  {
    // Do nothing: An ostrich can't fly
  }
}
Bird ostrich = new Ostrich();
ostrich.fly(1000)
```
The class Bird is not fully substitutable by class Ostrich

- Harden Conditions
Setting values to fit derived class based on its unique properties

```java
class Rectangle
{
  public void setHeight(int height)
  public void setWidth(int width)

  public int calculateArea()
  {
    return this.width * this.height
  }
}
class Square extends Rectangle
{
  public void setHeight(int height){
    this.height = height
    this.width  = height
  }
  public void setWidth(int width){
    this.height = width
    this.width = width
  }
}
 
Rectangle  r = new Square();
r.setWith(10);
r.setHeight(20);
r.calculateArea() // return 400 instead of 200
```
Rectangle is not fully substitutable by Square

- Partial Implemented Interfaces
Not implementing all the methods of the interface
```java
interface Account
{
  void processLocalAccount(double amount)
  void processInternationalAccount(double amount)
}
class SchoolAccount implements Account
{
   void processLocalAccount(double amount)
   {
     //business logic here
   }
  void processInternationalAccount(double amount)
  {
    throw new RuntimeException("Not Implemented")
  }
}
```
Throwing exception to mark that the method is not support by this class violates LSP
Hence an Account is not fully substitutable by SchoolAccount.

- Type checking 
```java
for(Task t : tasks){
  if(t instanceof BugFix){
    BugFix bf = (BugFix)t
    bf.initializeBugDescription()
  }
  t.setInProgress();
}
```
Indication that the sub types are not adhering to the base class

> Fixing Violations
Two great ways
* Eliminate incorrect relations between objects
* Use "Tell, don't ask!" principle to eliminate type checking and casting

- Empty Derived Methods or functions.
* Break the relationship 
```java
class Bird
{
  //Bird data and capabilities
  public void fly(int altitude)
  {
    setAltitude(altitude);
    //fly logic
  }
}
class Ostrich 
{
    //Ostrich data and capabilities. No fly method
}
```
- Partial Implemented Interfaces
* Break interfaces down into smaller and more focused 
```java
interface LocalAccount
{
  void processLocalTransfer(double amount)
}

interface InternationalAccount
{
  void processInternationalTransfer(double amount)
}

class SchoolAccount implements LocalAccount
{
   void processLocalTransfer(double amount)
   {
     //business logic here
   }
}
```

- Type checking 
Create a class for the checking object and override the default method.
```java
// for(Task t : tasks){
//   if(t instanceof BugFix){
//     BugFix bf = (BugFix)t
//     bf.initializeBugDescription()
//   }
//   t.setInProgress();
// }
class BugFix extends Task
{
  @Override 
  public void setInProgress(){
    this.initializeBugDescription();
    super.setInProgress();
  }
}
for(Task t : tasks){
  t.setInProgress();
}
```
> Summary of LSP
Dont think of relationships in terms if "IS A". Instead ask yourself is a particular type always substitutable by another sub type.
Empty methods, type checking and hardened preconditions are signs that you are violating the LSP. 
 

### Interface Segregation Principle(ISP)
> Modularizing Abstractions with ISP
The perfect granularity level for abstractions
It is defined as clients should not be forced to depend on methods that they do not use.
The interface here does not mean interface keyword for programming language. It means any public methods that all class depends upon.

It reinforces other principles.
* Keeping interfaces lean makes the derived class fully substitutable by the base class
* Class with few interfaces are more focused and have single purpose.

- Identifying Fat Interfaces
There are couple of symptoms that manifest themselves that tell you precisely that the interface should be refactored and made smaller
* Interface with many methods
```java
interface LoginService
{
  void signIn()
  void signOut()
  void updateRememberMeCookie()
  void getIUserDetails();
  void setSessionExpiration(int seconds)
  void validateToken(jwt token)
}

class GoogleLoginService implements LoginService
{
  void signIn()
  void signOut()
  void getUserDetails()
  void updateRememberMeCookie(){
    throw new Exception("not implemented")
  }
}
```
* Interfaces with Low Cohesion
Cohesion refers to the purpose of a particular component and all the methods are aligned with  the overall purpose
```java
interface ShoppingCart
{
  void addItem(Item item)
  void removeItem(Item item)
  void processPayment()
  void checkItemInStock(Item)
}

class ShoppingCartImp implements ShoppingCart
{
 public void processPayment()
 {
   PaymentService ps = new PaymentService();
   ps.pay(this.totalService)
   User user = UserService.getUserForTransaction();
   EmailService emailService = new EmailService();
   emailService.notify(user)
 } 
}
```
Here processPayment and checkItemInStock do not conceptually belong to a shopping cart and that makes it not cohesive, increases coupling.  They could belong to another interface.

* Empty Method 
```java
public class SchoolAccount extends Account
{
  void processInternationalPayment(double amt){
    // Do nothing, Better than throwing an error
  }
}
```
- Refactoring Code that depends on Large Interfaces
* If you own the code; break interfaces into pretty easy and safe due to the possibility to implement as many interface you want.
* External Legacy Code: You can't control the interfaces in external code so you used design patterns like Adapter. 

```java
//From  a fat interface.

interface Account
{
  double getBalance()
  void processLocalPayment(double amount)
  void processInternationalPayment(double amount)
}
//To three lean interfaces
interface BaseAccount
{
    double getBalance()
}
interface LocalMoneyTransferCapability
{
    void processLocalPayment(double amount)
}
interface InternationalMoneyTransferCapability
{
    void processInternationalPayment(double amount)
}
```

### Decoupling Components with Dependency Inversion Principle
I think this is the most important principle among the SOLID  and allows creating systems that are loosely coupled, easier to change and maintain.
The DIP states that
1. High level modules should not depend on low level modules, both should depend on abstractions.
2. Abstractions should not depend on details. Details should  depend on abstraction. 

A whole lot of questions on the definition:
1. High Level Modules: They are the part of applications that bring real value, modules written to solve real problems and use cases.  They are business logic; provides the features of the application. Tells what the software should do but not how they should do it. 
EG: Payment, User Management,  
2. Low Level Modules: implementation details require to execute business logic. They re the internal of a system, tells how the software should do various tasks.
EG: Logging, Data Access, Network Communication, IO; 

They are not absolute terms, they are relative to each other.

3. Abstraction is something that is not concrete. Something that as developers we cannot "new" up. In Java applications, we tend to model abstractions using interfaces and abstract classes. 
> Putting all together 
A(H)-> Abs <- B(L)

> Writing Code That Respects the DIP
- Low Level Class
-- Concrete data access class that uses SQL to return data from database
```java
class SqlProductRepo
{
  public Product getById(String productId)
  {
    //Grab product from SQL database
  }
}
```

- High Level
-- High level(PaymentProcessor) class depends directly on low level(SqlProductRepo) as it news it up.
```java
class PaymentProcessor
{
  public void pay(String productId)
  {
    SqlProductRepo repo =  new SqlProductRepo();
    Product  product = repo.getById(productId);
    this.processPayment(product);
  }
}
```

- Abstract the dependency 
-- Interface 
```java
interface ProductRepo
{
  Product getById(String productId)
}

class SqlProductRepo implements ProductRepo
{
  getById(String productId){
    //concrete details for fetching the product
  }
}

class ProductRepoFactory
{
  public static ProductRepo create(String type){
    if(type.equals('mongo')){
      return new MongoProductRepo();
    }
    return new SqlProductRepo();
  }
}
class PaymentProcessor
{
  public void pay(String productId)
  {
    ProductRepo repo =  ProductFactory.create();
    Product  product = repo.getById(productId);
    this.processPayment(product);
  }
}
```
After implementing Dependency inversion, we had pretty much abstraction as dependency, however, there are still some coupling, this is where dependency injection comes in.

> Dependency Injection
A technique in which a component does not have to bear the responsibility of creating its one dependencies. 
Simply, the technique that allows the creation of dependent objects outside of a class and provides those objects to a class. 
There are several approaches of doing this. 
1. Public setters
2. Constructor Injection
```java
class PaymentProcessor
{
  public PaymentProcessor(ProductRepo $repo){
    this.repo = repo;
  }
  public void pay(String productId)
  {
    Product  product = this.repo.getById(productId);
    this.processPayment(product);
  }
}
ProductRepo repo =  ProductFactory.create();
PaymentProcessor paymentProc = new PaymentProcessor(repo)
paymentProc.pay('123')
```
Manual DI is complex and hence we need a better  approach, which is the Inversion of Control (IoC) principle .

> Inversion of Control (IoC)
Helps to create large systems by taking away the responsibility of creating objects. 
This is the design principle in which the control of object creation, configuration and life cycle is passed to a container or framework. The object creation, configuration and life-cycle is inverted from the programmer to the container.
Eg. Spring Bean.

>Recap: DIP, DI nd IoC

> Demo: Applying the DIP 
- Decoupling components
- Improving testability
* Payment Component
Highly coupled with EmployeeFileRepository and EmailService
In the constructor, it is creating its own dependencies.
Also sendPayments method of the class is using static calls which is also another sign though we don't new up.
Questions to ask while refactoring?
1. What if a particular client does not want to read employees out of CSV file, what's going to happen if you want to read from SQL database?
2. What happens if a particular client does not want employees receive emails but text messages or notifications?

The way this component is coded makes it difficult to modify behaviour at runtime

3. Testing is also affected. 
The main goal is to test the payment class where  the total amount of service paid is equal to the sum of salaries of employees.  We don't care about where the employees are retrieved from, we don't care about how they are notified, these problems are caused by coupling

- Fixed the Design with DIP 
Right now our high level component which is PaymentProcessor  on low level module(Email, FileStorage). We need to break the dependency, both should  depend upon abstraction. 

### Summary 
Time to recap some few takeaways 
1. Technical Debt: The silent killer of software projects
2. Coupling: The main reason of technical Debt(Code Rigidity and Frigidity)
3. SOLID: Tackling coupling and promote designs that evolve and grow over time
The SOLID principles are the foundation of clean system design 
4. Tools for writing clean code: Pyramid of clean code 
* SOLID -> Design Pattern -> TDD -> Continuous refactoring
*  Remember that you always have to pay your technical debt, otherwise, it will grow out of control and it will lead your project to a halt 

