# Refactoring: Best Practices 

Any software project accumulates technical debts over time  and without any refactoring, its likely to fail sooner or later. Refactoring is an essential skills for any software engineer adn this course gives you the ability to do so. 
You will learn how to convert clunky and difficult to maintain codes into elegant and flexible. 

Software engineers main programming tasks are about reading, writing and changing existing(maintaining) codes.


Refactoring means taking old ugly code and changing it better without changing how it behaves. 


Several  questions about refactoring includes
> Why, What, When not and When?

* What 
Martin Fowler puts refactoring as a change made to the internal structure of a software to make it easier to understand  and cheaper to modify without changing its observable behavior.

* Why 
i. There is technical Debt(Can't we all code nicely and there would be no need for refactoring skills)  People don't have enough experience(Junior, Mid-Level, Senior) and that has relation to code quality written(Low to high). Other factors could be lazy coding(sloppy solutions), tight deadlines.  
ii. Without refactoring productivity decreases

* When
Continuously. At least minor improvement when adding new features. And Boy Scout Rule(Leave the campgroud cleaner than you found it). The same can be applied to code; Leave the code cleaner than you found it. Follow guidelines to write cleaner code.

* When not to refactor
i. When current code doesn't work.
ii. Deadlines must be met.
iii. Not gold-plating(When code is in good shape and works fine)

> Business is well served by continuous refactoring, yet the practice of refactoring must coexist harmoniously with business priorities.

## Code Smell

Before you refactor, you actually need to know how to identify a problem. 
Code Smell is a surface indication that usually corresponds to a deeper problem in the system. 

The pattern of refactoring
Identify a Code Smell > Understanding why it is bad > Identify it in code > Fix it 

The Refactoring Process
Verify existing behavior > Ensure tests are valid and passing > refactor > Verify behavior again 

> Code Smell Taxonomy 
A way of grouping code smell and that was the work of Mika Mantyla and Casper Lassenius.  
And they are as follows:  Bloaters, Object-Oriented Abusers, Change Preventer, Couplers, Dispensable.

### 1. Fixing Bloaters(Bloating Code)
> Large methods and classes
* Method Bloaters: 20+ lines
* Class Bloaters: Count responsibilities(SRP rule). 2+ responsibilities
- Occurs as software evolves and hence it accumulates over time. 
* Implementing new features in that single places. 
- Most Common bloaters
Long parameter lists, long methods, contrived complexity, primitive obsessions, data clumps, large class 

> Demo project
Online shop that sells food. It has a customer class, bunch of items to buy, and checkout-handler
The checkout-handler helps to calculate the price of shopping list. 

Calculating the prices involves looping over the items, get their prices, sum it up; check if a voucher is valid to change the price; checking for membership on delivery and finally return the total prices. 

Then we have we have tests for this methods on many scenarios. 

Issues with the calculateTotal method
* Long perimeter list 
* Long methods
* Does many things
* As more features get added when paying for items, the method will blow up. 

#### 1. Long Parameter List
One or two is typically fine, 3 should make you think and 4 or more is already suffering from this code smell and needs refactoring 
> **Long Parameter List Issues** 
* Hard to understand 
* Acts like a magnet for even more arguments and code.
* Acts as harbour for other code smells: Long method, primitive obsessions and data clumps. Hence solving others would take away this long parameter list issue

> **How to fix Long Parameter List** 
Fix Long methods, primitive obsessions  and data clumps.


#### 2. Long Methods
Contains too many lines of code. Aim for small methods; up to 10 lines or more but less than 20;
> **Long Method Issues** 
* Difficult to maintain 
* Easy to break.
* Attracts even more code.
> **How to fix Long Method** 
1. Extract method: Splitting a method into smaller methods
Here we extracted the one big method into three methods by delegation. 
Even after refactoring into methods with good names, we can take away the comments

2. Decompose Conditional 
This is similar a form of extract method but it focuses on if or switch condition. 
When the condition is too complex, we should extract them into methods or classes with descriptive names.
Here we replaced our if conditions with function with descriptive name.

#### 3. Contrived Complexities
Code that achieves an objective but is too complex. An easier, shorter or more elegant way exists to achieve the same goal.  

> **Contrived Complexity Issues** 
* Hard to understand
* Higher chance of breaking when changing

> **How to fix Contrived Complexity** 
1. Substitute algorithm: Replace with simpler and elegant code.
Here we replaced the two arrays with just one array. No need to store and later add, add where fetching the data.

#### 4. Primitive Obsessions
Using primitive type way too much instead of object

> **Primitive Obsessions**
* Major cause of long parameter lists
* Cause code duplication 
* Not type safe and prone to errors

> **How to Fix Primitive Obsessions**
1. Preserve whole object: Passing in a whole object as parameter.
Here we noticed that the customer can have membership and address, hence we used our already existing customer object and get the data using its getters. 
2. Introduce Parameter Object: Create an object, move primitives there and pass in the object. 
Here we created new class called Order to hold a customer and items.


> **Primitive Obsession: What We Didn't Cover**

We can do more to prevent our code from being error prone. For instance, the membership string is a perfect example for enum; this way it prevents mistyping of each membership. 
Our voucher is a simple string but it could contain code, startDate and expiration date as well hence a class would be perfect. Here the business logic on voucher is simple but if it becomes complex, you should consider a class. 
Also, address could be more than single string. A class could be introduced. 

#### 5. Data Clumps
They are group of variables which are passed around together(in a clump) throughout various parts of the program. 
They always or have to go together. 
Eg: 
* Fill in email template. ("Mr", "John", "Doe")
* Booking. ("startTime", "endTime")
* Date and time for return flight. ("there", "back")
* time window for delivery. ("from", "to")

> **Data Clumps Issues**
* Long parameter list
* Code duplication

Both data clumps and Primitive Obsessions often suggestion a specific problem: Missing domain objects. 
Hence you have bunch of primitive types that should be encapsulated into a class. 

> **How to Fix Primitive Obsessions**
1. Introduce Parameter Object: Create an object, move primitives there and pass in the object.
Example here is the delivery time window
2. Combine Entities 
We learned that the customer entity always go together with order entity hence they could be combined. 
Formulating their relationship, an order has a customer or a customer has or or more orders. 

#### 6. Large class
A class that does many things(more responsibilities). A God class is a class that does almost everything. 

> **Large class issues** 
* Very difficult to maintain
* Violates the SRP rule

> **How to Fix Large Class**
 1. Extract class
 Split into several smaller classes. 
 Here we splitted checkout handler into three classes.

#### Bloaters(Bloating Code) Summary
1. Methods and classes can shd shd be split
2. Strive for the most simplest and elegant solution 
3. Too many primitives indicates you should introduce new classes 

Demo code started with Long Primitive List which got solved with Long Method, Primitive Obsessions, Data Clumps. Then later solved other issues like Contrived complexity and large class


### 2. Fixing Object Oriented Abusers
> Refers to code that incorrectly applies object oriented principles. 
Examples: Conditional Complexity, Refused Bequest, Temporary field, Alternative classes with different interfaces.

> Demo Project
There is additional requirement to verify the age of the user buying the products. The Shop  is expanding to different countries and it should be tracked where from the address of a customer ordering an item.
So basically with the new changes,  Order has reference to a Customer, A Customer has an Address and Address has a field Country.

#### 1. Conditional Complexity
A complex switch operator or a sequence of if statements.

> Complex Conditional often means 
- Missing Domain Objects
- Not using polymorphism
- Not using inheritance

> **Conditional Complexity Issues**
* Starts simple but gradually harder to understand as logic is added.
* High likelihood of breaking
* Breaks OCP
Here: Age checking before selling items 

> **How to fix conditional complexity**
* Replace with polymorphism:
Here we added the age checking to the country classes and made a caller used it. 

#### 2. Refused Bequest 
> Bequest is the act of giving or leaving personal property by a will.
Scenario: You can your property out for inheritance and the other personal may refuse. And that how Refused Bequest is
> Refused Bequest is when subclass inherits fields and methods it doesn't need.  

>**Refused Bequest Issues** 
* Unwanted Inheritance

> **How to Fix Refused Bequest**
- Rename methods
- Push Down: Introduce new class to hold the unwanted methods
Here we rename a base class method to give meaning to all items

#### 3. Temporary Fields
Fields that have values only under certain conditions.

#### 4. Alternative Classes With Different interface
Occurs when two classes are similar on the inside  but different on the outside. 
The code are similar or identical but the method name or signature are different.
>**Issues**
- Not DRY - code is duplicated ith just minor variations
- Lack of common interface for a closely related classes. 
>**Solution**
- Abstract class
- Interface

Here: We made used of the class that does the conversion and deleted the method the does the same thing as the class 

#### Object Oriented Abuser Summary
Business logic grows and that result in a lot of if-else statements. Every growing if statement should be replaced with delegation or polymorphism. 

### 3. Fixing Change Preventers
When code change in one place results changing code in many other places
Examples: Divergent Change, Solution sprawl & Shotgun Surgery, Parallel Inheritance Hierarchies.

#### Base Project
Get the currency conversion rate from online service instead of hard-coded values;
The Code smell with this code: Divergent of Change, 

#### 1. Divergent Change
Changing several unrelated things within the same class 
>**Issues**
- Requires more typing
- Requires additional knowledge of what to change where. 
>**Fixing**
- Extract method: Split method into several methods
- Extract class:  Split into several classes

NB: New Requirement: Print currency rates

> Questions to ask:
- Do we have a situation where we will change the class for different reasons?
The answer is yes, this converter class does not only does the conversion but it also an expert in making http calls. 
Thats a lot of responsibilities to bear.

Use extract class to take the http functionality to a new class. 

#### 2. Solution Sprawl & Shotgun surgery
> Solution Sprawl
A feature spread across multiple classes. 
> Shotgun Surgery
The process of looking for all the repeated functionality in multiple classes to meet the new requirement. 
Solution sprawl leads to shotgun surgery and mostly used interchangeably
>**Issues** 
-  Difficult to remember all the interconnected places
-  New team members are likely to make mistake by forgetting to update one of the places 
>**Fixing**
- Combine into one: Consolidate the responsibility into a single class

#### 3. Parallel Inheritance Hierarchies
Changing in one inheritance tree causes a change in other sub trees. A special case of shotgun surgery 

#### Summary
Changing a software that requires multiple changes.

### 4. Fixing Couplers 
Code smell that result in tightly coupled classes.  
Coupling refers to the degree to which classes depend on each other. It could be Tight or Loose 
> Tight Coupling
Cascade changes due to change made. Thus classes are so tied that you cannot change one without changing the other. 
> Loose Coupling 
Change in one class requires no or minimum changes in other classes. 
List of Couplers:  Feature envy, inappropriate intimacy, excessive exposure, message chains and middle man 

#### 1. Feature Envy 
Class uses methods or accesses data of another class more than its own.
>**Issues**
- Hard to understand code that logically belongs elsewhere
>**Fixes**
- Move methods to where it is needed most

Code: Here we have a phone class and the customer class calls several methods of the phone class to achieve certain functionality.  

#### 2. Inappropriate Intimacy 
A class knows too much of  or has to deal with internal details of another class 

Code: A voucher class with public field(code) which could be accessed and assigned values outside the class. A business requirement changed and there has to be a validation on there code. What happens is wherever the code field is used we have to find it to do the validation. Best is to create  private field and set a value on it and can check for validation in that single place 

#### 3. Excessive Exposure
Happens when a class or a module exposes too many internal details about itself. 
Example of good encapsulation and minimum exposure: Calendar.getInstance. 

Code: In simpleCurrencyConverter class, when you don't want to know about where to get the rates from, you only need to convert hence the rates access is of less advantage to you.

#### 4. Message Chain
Code that calls(chains) multiple methods to get to the required data. 
```java
Customer.getAddress.getCountry.toString();
```
>**Issues**
- Learn class organization


Code: Getting a customer address and a country, checking if the customer is not from the US before doing the currency conversion. 

#### 5. MiddleMan 
All the class does is delegation to one class
>**Issues**
Every class has a cost and you shd know h ow it brings value, if there is no value in that delete it. 
>**MiddleMan Patterns**
Delegation can exist for a purpose
Facade, proxy, adapter

### 4. Fixing Dispensables. 
Codes that are not needed and can be removed.
Eg. Bad Comments, Dead code, duplicate code, speculative generality, lazy and data classes. 

#### 1. Comments 
They should not compensate for bad codes. 
Refactor code that you don't need comments in the first place. 

#### 2. Dead Codes
Unused code

#### 3. Duplicate Code 
Same code writing in multiple places 
Code with DRY in mind

#### 4. Speculative Generality

Code created just in case to support anticipated future features that never get implemented

Code with YAGNI(You ain't gonna need it) in mind

#### 5. Lazy and Data classes 
Lazy class has no functionalities 
Data class used as containers for data. 
Data class are code smell that are debateable.  That is where the DTO pattern comes in. This is a like data carrier btn processes 