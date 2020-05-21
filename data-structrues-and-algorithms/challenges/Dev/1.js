function stringPeeler(str)
{
  if(str== null) return
  const length = str.length
  if(length <= 2) return
  str = str.substring(1, length -1);
  return str
}
stringPeeler = (someString) => someString != null ? someString.length > 2 ? someString.slice(1, -1) : undefined: undefined

stringPeeler = s =>  s != null ?  s.slice(1,-1)|| undefined : undefined

stringPeeler = (someString) => {
  if(someString == null) return
  switch(someString.length){
  case 0:
  case 1:
  case 2:
      return;
  default:
      const arr = someString.split("")
      arr.pop();
      arr.reverse();
      arr.pop();
      arr.reverse();
      return arr.join("")
  }
}

console.log(stringPeeler())
console.log(stringPeeler("a"))
console.log(stringPeeler("ab"))
console.log(stringPeeler("abc"))
console.log(stringPeeler("abcd"))
console.log(stringPeeler("abcef"))


// require "test/unit"

// # remove the first and last letter of a string
// # if there is less than 2 characters return zero.
// def quartered value
//   raise ArgumentError, 'Argument is not a string' unless value.is_a? String
//   return value unless value.size > 2
//   value[0] = ''
//   value.chop
// end


// class QaurteredTest < Test::Unit::TestCase
//   def test_quartered
//     assert_equal 'orl', quartered('world'), "quartered('world') should return a string called 'orl'"
//   end

//   def test_quartered_ignore
//     assert_equal 'hi', quartered('hi'), "quartered('hi') should return 'hi'"
//   end

//   def test_quartered_invalid
//     assert_raise_message('Argument is not a string', "quartered(2) should raise exception") do
//       quartered(2)
//     end
//   end
end