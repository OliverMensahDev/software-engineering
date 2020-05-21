# Abstract Art: Getting Things "Just Right"
Abstraction provides great advantages since it makes applications easier to maintain, test and extend. 

As developers we are either over-abstractors or over-abstractors. Using principles, will guide us to find the right balance of abstraction. 

No matter how careful we are, there is the possibility of LEAKY ABSTRACTION.

With Mechanics of Abstraction such as Design Patterns, Interfaces, Inheritance, Layering, we will be able to get Abstractions just right. 

## Abstraction
It is about simplifying Reality, ignoring extraneous details so as to focus on what is important for a purpose. 
Basically, it's about hiding details to work with.
Everything is an abstraction when dealing with computers. 

> Abstraction in Programming
Technically, we could go the bits of current that exist at the hardware level but with programming, at its low  level, we have machine instructions. Computer Languages are abstractions for dealing with these machine instructions. These provides as for humans to easily interact ith systems without having to know the details of the process architecture. 
Up another level is the language primitives and constructs which are abstractions for dealing specific pieces of computer memory. 
Up next is the Programming for user to deal with things at higher level through an interface which could be the web,mobile, desktop or command-line. 
At this level developers focus on techniques and code construct that makes application easier to maintain, extend and test. 
These take several forms and some common abstractions are layering, wrappers and methods,and interface and inheritance. 

> Layering 
- UI layering: MVVM, MVC
- Application Layering: Separate Responsibilities

> Wrappers and Methods
- Facade Pattern: Wraps complex system
- Method: Clear parameters and return value to wrap a complex process
- Component: Wrap complex process into  properties and methods
Eg: URL class to easy work on a given url.

> Interface and Inheritance
- Interface: No worries about details, provide the contract 

## Why Abstraction 
Abstraction is awesome with benefits like maintainability, extensibility and testability. 
- With Layering we know where to go when there is a problem.
- With wrappers, we can work with higher modules without knowing the ugly details 
- With interfaces, we can easily drop new implementations without modifying existing calling code and easily drop test objects for testing our code.

> Abstraction can be awful
- Complexity
- Confusion 
- Debugging complexity 

# Who Are You(Developers)
Over or Under Abstractor which is the natural state of developers without external factors
## Over Abstractor
They prefer to build highly extensible systems. These people usually say we'll have a good use for this in the future
Build overly complex and difficult to maintain systems.
These people:
- When building UI: They prefer to download the latest UI framework 
- When coding an application,  focus on: the current deliverable features
- When need to share state, they prefer to: create a state manager object
- When getting data from SQL database, they rather: raw query like SELECT from Customers
- When instance of object is needed, they would rather: 
raw instantiation(new Logger())


## Under Abstractor
They prefer to keep things simple, but are rigid and difficult to maintain. These people:
- When building UI: They prefer to use what comes "in the box" with my developer tools. 
- When coding an application,  focus on: all the cool stuff the application could do in the future
- When need to share state, they prefer to: use a global variable
- When getting data from SQL database, they rather: set up ORM layer to manage customer entities
- When instance of object is needed, they would rather: 
use service locators (DependencyResolver.get(ILogger())

There is no right or wrong response, what is right in one environment will be wrong in another. 


## Symbiotic Relationship
There is always a pendulum effect in architecting software. And thats why having both abstractors helps.
The over-abstractor helps the under-abstractor get things Just Right. Same as the over-abstractor helps the under-abstractor to get things Just Right. 
Understand your environment which means to know
- Yourself: Whether you are over/under abstractor
- Tools: PL, Coding techniques
- Infrastructure: Hardware and the OS the app runs on
- Business: The people using the application
- Team: Decision making on dev process.

## Practical Advice
Abstractions are compelling but they do have drawbacks. Here are some principles to get our Abstractions JUST RIGHT. 
### DRY: Don't Repeat Yourself.** 
This is usually meant for Under-Abstractors. 
When we need to code and the functionality is similar to a code we coded before, it is tempting we copy, paste and edit few places. This is easy but difficult to maintain.
Instead, we keep common code in a shared location

> Code Demo:
Our base project has many duplicates action hence introducing Interface and Inject into method to reduce code duplication

### SOC: Separation of Concerns
This is also for under-abstractors. This means we want to keep a different functionality of application into separate methods, classes, or projects. For instance, we want to keep data access from the business logic. This is related to SRP principle, the "S" in SOLID principle.
This brings the concentration on making sure that our classes and methods do one thing. 
 
Here are some techniques we could use:
- Split functionality into separate methods/classes
- Add layering to separate responsibilities(Presentation, Business Logic, Data Access, Data Storage) 
- Use wrappers to isolate functionality
- Dependency Injection to get reference to objects rather than creating it

> Code Demo
The `fetchData` has the responsibility to choose the type of Repository before fetching the data and displaying it. The main concern of `App` class is displaying the data. So we moved setting up the repository to  factory class.

### YAGNI: You (Ain't Gonna) Aren't Going to Need it.
This advice is for Over-Abstractors. We want to code for our current needs not for future speculations. This does not mean we don't think about the future, we do but we don't implement it yet. This tells us if we need abstraction, it tells us how far we can go. 

### KISS: Keep it Simple, Stupid.
This is for Over-Abstractors. To make it less insulting, it could be called `Keep It Short & Simple` or `Keep It Simple & Straightforward`. 
This tells us if we need abstraction, it tells us how we can keep

### DDIY: Don't Do It Yourself?
This is for Over/Under-Abstractors.
Before building something, we should check to see what is available. 
For Over-Abstractors: They like to build things to solve specific problems.
For Under-Abstractors: They shy away from external frameworks  and libraries. 

## Leaky Abstractions
Joel Spolksy stated that All non-trivial abstractions, to some degree, are leaky. 
Abstractions fail. Sometimes a little, sometimes a lot. There's a leakage. Things go wrong. It happens all over the place when you have abstractions. 

### What are leaks
Details that are not completely hidden by abstraction.  When the developers don't see the details to understand the details of the underlying  abstraction.

### Example of Leaks
> Interface 
> Wrappers 
> Layers

## Getting Abstractions Just Right
Add abstraction as you need it(not before).
Add Repository: Connecting to different data sources. If you are not swapping a data source often there is no need for  a repository. 