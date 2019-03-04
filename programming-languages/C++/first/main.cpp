#include <iostream>
#include <iomanip>
#include <cstdlib>


using namespace std;

int main()
{
   int year, firstDatayInCurrentMonth;
   int currentMonth = 1;
   int numDays;
   cout << "What year do you want a calender for?";
   cin >> year;
   cout << endl;

   //first day of year
   int x1, x2, x3;

   x1 = (year -1)/4;
   x2 = (year - 1)/100;
   x3 = (year - 1)/400;

   firstDatayInCurrentMonth  = (year + x1 -x2 + x3) % 7;
   cout << year <<endl;

   //look over all months in year
   while(currentMonth <= 12){
    if(currentMonth == 1){
        numDays = 31;
        cout << "January" << endl;
    }
    else if(currentMonth == 2){
        numDays = 28;
        cout << "February" << endl;
    }
    else if(currentMonth == 3){
        numDays = 31;
        cout << "March" << endl;
    }
    else if(currentMonth == 4){
        numDays = 30;
        cout << "April" << endl;
    }
    else if(currentMonth == 5){
        numDays = 31;
        cout << "May" << endl;
    }
    else if(currentMonth == 6){
        numDays = 30;
        cout << "June" << endl;
    }
    else if(currentMonth == 7){
        numDays = 31;
        cout << "July" << endl;
    }
    else if(currentMonth == 8){
        numDays = 31;
        cout << "August" << endl;
    }
    else if(currentMonth == 9){
        numDays = 30;
        cout << "September" << endl;
    }
    else if(currentMonth == 10){
        numDays = 31;
        cout << "October" << endl;
    }
    else if(currentMonth == 11){
        numDays = 30;
        cout << "November" << endl;
    }
    else if(currentMonth == 12){
        numDays = 31;
        cout << "December" << endl;
    }

    cout << " S M T W T F S" << endl;
    cout  <<"_______________"<<endl;
    int day = 1;
    int i = firstDatayInCurrentMonth;
    while(i > 0){
     cout << " ";
      i = i -1;
    }
    while(day <= numDays){
     cout << setw(2) << day  << " ";
     if(firstDatayInCurrentMonth == 6){
       cout << endl;
       firstDatayInCurrentMonth  = 0;
     }else {
        firstDatayInCurrentMonth += 1;
     }
     day += 1;
    }
    cout << endl << endl << endl;
    currentMonth += 1;
   }
    return 0;
}
