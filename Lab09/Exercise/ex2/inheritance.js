//create a defining function (kind of the same as creating a class but via function
var Person = function(){};

//adding a method that will act as the constructor through prototype object of the defining function
Person.prototype.initialize = function(name, age){
    this.name = name;
    this.age = age;
}

//add the function object describe to the defining function
Person.prototype.describe = function(){
    return this.name + ", " + this.age + "years old.";
}

var Student = function(){};

//Making inhertance throug prototype: prototype of Student() (which is Student.prototype) inherits Person()
//=> Student() inherits Person()
Student.prototype = new Person();

Student.prototype.learn = function(subject){
    console.log(this.name + " just learned " + subject);
}

var std = new Student();

std.initialize("Hung", "24");
std.learn("Inheritance");

//CREATING THE TEACHRER OBJECT
var Teacher = function(){};

Teacher.prototype = new Person();

Teacher.prototype.teach = function(subject){
    console.log(this.name + " is now teaching " + subject);
}

var tch = new Teacher();
tch.initialize("Chung DT", "N/A");
tch.teach("Web Programming");
