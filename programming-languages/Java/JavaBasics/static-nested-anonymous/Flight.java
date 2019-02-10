class Flight {
  int passengers;
  static int allPassengers;
  
  static int getAllPassengers() {
    return allPassengers;
  }
  static void resetAllPassengers() {
    allPassengers = 0;
  }
}