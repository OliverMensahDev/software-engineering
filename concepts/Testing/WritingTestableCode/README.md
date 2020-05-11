 # Testable code
Code that makes testing easy. 
Most software devs dont write code for testability hence they struggle with software practices like unit testing and test driven development.
Best practices on object construction, working with dependencies and managing application states

# Why write testable code 
- making software components interchangeable or replaceable makes it easier to test individual components 
- Easier to maintain later
- Approach to unit testing and tdd practices

# Current State of Testing 
For SWE: 
- Very little testing
- Ineffective testing 
- Inefficient testing 

Why these:
- It's too hard to test
- Not enough time to test 
- Not my job to test as SWE 

Why write test 
- Reduce bugs 
- Reduce cost 
- Improve design 
- Documentation 
- Eliminate fear 

Types of Tests: 
- What they are testing 
1. Unit test
2. Integration 
3. Component
4. Service 
5. UI 

- Why they are being tested 
1. Functional
2. Acceptance 
3. Smoke Test
4. Exploratory  

- How they are being tested 
1. Automated 
2. Semi automated
3. Manual


# Demo 
With the code in `1TestableCode` folder, the bad code can be tested only by running the program manually.
The Good code got tested automatically by creating its own class for it. 
The idea is to take code that is difficult to test to a testable phase. 

# Creating Seems in Code
Problems without Seams:
- Cannot pull apart code 
- Cannot connect test harness
- Cannot replace dependencies with test doubles
- Cannot test in isolation 
Symptoms 
- Keep eye on new keyword 
- Keep eye on static method calls 
- Direct coupling
Solution 
Create seams by 
- Program to interface
- Decoupling dependencies
- Inject dependencies by constructor injection 

## Our Code without Seams
Goal is to get the invoice details and print them.

This code for `PrintInvoiceCommand` class would be difficult to test since there is  dependency on the database

              -> Database -Access to DB
PrintInvoice  -> Printer  -Access to Printer
              -> DateTime -Access to OS Clock

Code rewritten to make it testable.

              Interface -> Database -Access to DB
PrintInvoice  Interface -> Printer  -Access to Printer
              Interface -> DateTime -Access to OS Clock

During testing you can replace the dependencies with mock objects

//TODO:: Find out how to test a method to see number of times another method was executed in that method. 

## Summary 
Here learned to create seams in code so classes can be tested in isolation by decoupling dependencies, program to interface rather than implementation 

# Creating Testable Objects
Learn about ways to construct objects that are easily testable. In all, this is about 
- constructors
- problems that occur when we mix construction of objects and their behavior
-  Identify symptoms of object construction that are difficult to tests and refactor them

## Constructor 
Constructing and Testing objects are different tasks. When constructing an object, we are assembling the components of the object in such away that when we are done, we have a fully functional object to perform some tasks. 
- Constructors are methods used to build instances of our class. 
- Inside the constructor, we execute code necessary to prepare the object for use.

However, its quite common to see developers doing additional work inside the constructor;
- Set up dependencies
- Talk to external services
- Execute initialization logic
- Execute application logic
This creates problems 
- Tight coupling for setting up dependencies
- Difficult to test the logic in constructors
- Logic is difficult to test 

Symptoms for such problems
- The keyword new: Indicates tight coupling to a dependency. But its fine with value objects
- Logic in constructor: Like if-else, switch statement. 
- Any code aside than assignment of values is an indication

Solution
- Inject dependencies and assign them to properties 
- Avoid logic in constructors such as conditional, or call methods meant for initialization from constructor,etc.
- Use well established patterns like factory, builder, IoC/DI
- Don't mix construction and logic
- Separate injectables(Services that implements interfaces) and newables(Object graph like entities and value objects)

Injectables vs Newables
Injectables can ask for injectables in its constructor but not newables.
Newables can ask for newables in its constructor but not injectables


## Code Demo 
Hard: 
- Tight coupling btn PrintInvoiceCommand and InvoiceWriter class 
 - Additional work on the InvoiceWriter construction
 like setting up page-layout  and setting up ink, hence mixing application logic with construction

 Easy
 - Let constructor of the InvoiceWriter which is Injectables accept injectables hence we replace Invoice which is newable with PageLayout which is injectable. Object construction must follow Newable and Injectable rules

 # Working wth Dependencies
 Learn to work with dependencies that makes testing easier. 
 ## Law of Demeter: 
 General principle of OOP proposed by 
 The principle states that a module should have access to a certain information. In other words, a software component or an object should not have the knowledge of the internal working of other objects or components.

This can be summed as only talk to your friends, don't talk to strangers. 
 > Symptoms
 - Series of appended methods
 > Solutions
 - Talk to immediate dependencies; thus inject the dependencies we need

 ## Summary 

The PrintInvoiceCommand class has a dependency on container and then uses the container to resolve all the dependencies needed for the class to function as expected.  This makes testing difficult. 
The IoC container now acts as a service locator

To fix this;
We refactored the PrintInvoiceCommand to ask for the dependencies needed directly. 

> Follow the law of Demeter for testability 

# Managing Application State
Learn about global states, it problems in terms of testing, identify when app is having global state and then refactor that.

> Global states
Also,known as application state is the set of variables that maintain the high level state of software application. 
It might implemented in our of the two states
- Single Application state Object like PHP HTTP Status code 
- Global variables: Can be accessed anywhere in the application.

No matter their implication they have only one instance in memory. 

Why do we do so:
To share data btn two or more classes.
> Problems
- Coupling to global state 
- Difficult to set up tests
- Prevents parallel tests 

Usually unusual changes to the state value is termed as spooky action at a distance. 

> Symptoms
- Global variables 
- Static methods and fields
- GoF Singleton 
- Units tests that run parallel fail but works in isolation

> Solution
- Keep state local if possible. if only one method then scope should be method, if more than one method in the class then scope should be the class, it should not evolve outside the class. 
- Wrap static methods of third party libraries. 
- Use IoC/DI singleton rather than GoF singleton 

# SRP
Learn to limit class to a single responsibility for testability
> Symptoms for multiple Responsibilities
- Described with "and or "
- Class or method too large 
- Many Injected dependencies
- Identify frequently changing class.


> Solutions
- Look for multiple responsibilities in a class. Look for multiple reasons why the class will need to change, multiple people, different roles, multiple tasks in the same class
- Label responsibilities. Simple describes what is doing and ecompose that into SRP class

# Next: The Big picture of writing high quality,fully tested software 
- Begin to learn to write testable code 
- Learn to write effective unit tests
- Learn test-driven development