# Writing Readable and Maintainable Code
As a developer you need to develop and maintain software.

When you stare at code for longer period of time trying to figure out what the code does? Questions like `Why can't I understand this code?` pop up in my head?
- Is it because I'm not experienced enough?
- Do I need 5yrs of experience to get to another level where I will be able to understand all code that I encounter?
- Is it because the code is terrible or poorly written?

Also, there is one question that I keep asking myself: 
- How do I know if I write professional code? Thus when the person reviewing my code does not give any bad reaction; what a heck is this?

The answer to these questions is defined by Donald Knuth as The best programs are written so that computing machines can perform them quickly and human  beings can understand them clearly.

In this course, you will learn how to write code that you and others will enjoy working with; thus easy to read, understand and maintain.

CLEAN CODE IS ABOUT READABILITY

## Benefits of Clean Code
Clean code is not a nice-to-have. It is practically a necessity.
> Dirty Code has consequences like
- Less understanding of code which in turn leads to bugs
- Technical debt and that reduce productivity. 
- Lower job satisfaction
> What do you naturally care about as a developer?
- Clean code

## Overview 
- Naming things: Classes, methods, variables
- Better Constructors: 
- Implementing methods
- Handling Exceptions: Happens in methods
- Class: What it should contain and how it should be organized
- Writing Comments
- Improving Tests
- Maintaining clean code
 
John Woods:His quote really made always improve my own code. 
It reads as follows: Always code as f the guy who ends up maintaining your code will be a violent psychopath who knows where you live.

### Class Name Guidelines
> Name should be noun
- Concrete like Calculator 
- Abstract like EmailSender
> It should be specific
- How specific: No clear answer. 
For instance a house with specific names, getting the keys will always be  problem?
> Code Demo:
- CommonUtils: Noun but not but not specific at all. It probably has a lot of unrelated stuff. 
Hence we have to take a look inside and the methods will help you get what it does.
The question that comes next how are the methods related to the class. 
- *Solution to the CommonUtils*:
The class has a lot of helper methods for time, strings and numbers which could be names TimeNumberStringUtils but this breaks the SRP rule hence we should split them into individual classes like TimeUtils, NumberUtils, StringUtils.

- Client: Client is noun but not specific. What kind of client? Got to look inside the class to find out. It has a comment to tell what the client is about.

> Techniques for fixing poorlyChosenName
- Split 
- Rename

> Coordinator Class
Class meant for delegating tasks to other classes. They are meant to bring classes together. 
- People like to add suffix manage. Eg. StoreManager, FlightManger.
- It is okay to call entire application a manager but a single class not.
- Narrow to scope. Eg. Writer, Builder, Controller, Container,
- To narrow you can follow design patterns naming like CarFactor(for producing car objects), HTTPBuilder(for creating http objects with method chaining)

### Variable Name Guidelines
- Always specific
- never single letter
- ideally 1-2 words
- use camelCase
- prefix booleans with "is" like isValid.
- use ALL_CAPS for constant.
- Name after what the server returns  

> Code 
- The http response was assigned to a variable called $data.
This should be named after what the method returns. if it is details of a customer should be customerDetails, etc.

### Method Name Guidelines
> The should reveal intent
> Just by looking at the name the method should be known what it does. Not how it does it but what
- One rule could be  if you have to look inside the method to understand what it does- the name should be improved.
- They are actions and here is  template
Verb(Do what) Noun(To what) Result 
load +  Page = loadPage()
set  +  Price = setPrice
convert + Currency = convertCurrency()
Sometimes the noun could be omitted if the noun itself is the class. For instance Currency class can have convert as method on convertCurrency.
> Code Demo
Our send method on the WebHttpClient is not meeting the template for naming methods. So it should refactored. On being specific, it should be named to sendGetRequest or sendGet is cool
> Methods Anti-patterns
- Method does more than the names says
```php 
function getCustomerData()
{
  //get Data
  //format it
  //pre convert 
  return $data
}
```
This methods does more than just getting data. It should have be named `get&Format&ConvertCustomerData()` which is bad. This should be split. 

> EXceptions
- Static methods
- Fluent interface

## Better Constructors
Usually creating object of class requires using the `new` keyword. When the creation of the object of the class is very complex used static factory methods.

> Static factory methods
Encapsulate the construction logic thus helps hide the complexity. And you want to change the construction of class, you do that in one place not all the places the class is used. 

> Constructors chaining
Used for several constructors and chaining helps to avoid boilerplate code to keep things DRY.

> Builder Pattern
When there constructor telescoping anti-pattern, this comes to a rescue

## Implementing Methods
Majority of code happens in methods. Classes are just containers, constructors are for creating objects.
With implementing methods we will look at: 
- What methods should return 
- Parameters 
- Inside the methods: Fail fast and return early principle and how they contribute to clean code
- conditionals and best way to handle them
- code duplication 

> Clean Code Concepts
- DRY: Don't Repeat Yourself
- WET: Write Everything Twice
- Cyclomatic Complexity: Software metric to measure the complexity of a program. 
Aim for lower CYC.  
- Signal to Noise Ratio: Signal is code that is clean. Noise is everything that prevent us from understanding code.

### Return from Methods
> Avoid returning null. 
- NullPointerException
- Check 
Catching exception or checking for null adds more CYC. 
> Avoid Magic numbers

### Parameters
Fewer method arguments are better. 0-2 is Ok, Refactor 3 or more.
> Methods with 3+ arguments might:
- Do too many things hence split it
- Too many primitive types hence pass object
- Takes boolean (flag) args hence remove it

### Flag arguments
They proclaim the function does more than one thing.

> Split functions
For instance instead of one function with flag, create two function for each state of the flag. 
Like `switchLights(room, boolean)` shd be `switchLightsOn(room)and switchLightsOff(room)`


### Magic Numbers
if its one then the function name shd describe it if not then create descriptive variables for the numbers


### Return Early
Checking for validity of values might end up writing nested if-else statements hence increasing the CYC.
To reduce much CYC, return early

### Fail fast
Check illegal args and throw some exception b4 the application classes with some errors. 

### Conditional Complexity
Simply conveys if something is true or false so they give u one option out of many
> Boolean Checks
- Not this `(!doorClosed == false)
- is Prefix (isDoorClosed)
- not antinegatve like isDoorOpen is simpler than !isDoorClosed

> Logical Evaluation
- Extract conditionals to descriptive method that sounds like a boolean than just using primitives

### Handling Exception
Throw clearer exception message
Throw new custom exception in the catch or log it

### Class Organization 
> SRP 
A class should do one thing. Hence a class with two methods breaks it. This definition is not valid and that could be a direct translation for the SRP of method.
SRP of class means a class should have only one reason to change. 
Functionality of class should be based on role hence asking the question who does this functionality rather than what

> Cohesion 
SRP leads to higher cohesion. 
Cohesion means tendency to unite or logically connected together. Makes sense to group things together to work together. Cohesion in context of programming refers to the degree to which elements inside a class or module belong together.
Cohesive class has
 - Fields and methods are co-dependent
 - methods that use multiple class fields 

> Coupling
The degree of interdependencies btn software components
- Tight coupling
Classes are tied that you cannot change one without changing the other.
Tight coupling is  maintenance hell.
- Loose Coupling
Changes in one class requires less or no changes in other class
- To reduce Tight coupling:
Program to interface, adhere to SRP.

Adhering to SRP creates high cohesion and also try to make code low coupled hence there is code quality leading to maintainability and Readability

> Principle of Proximity or the Proximity Rule:
It is about placing interconnected methods in the right order so it reads like a book; top-down approach
