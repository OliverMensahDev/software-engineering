function condense(sequence){
  let result = ""
  for(let i = 0; i < sequence.length - 1; i++){
    let c1 = sequence.charAt(i)
    let c2 = sequence.charAt(i+1);
    if(c1 !== c2){
      result += c1
    }else{
      i++
    }
  }
  //account for the last
  if(sequence.charAt(sequence.length -2) !== sequence.charAt(sequence.length -1)){
    result += sequence.charAt(sequence.length -1)
  }
  return result
}

console.log(condense("45322367552"))


function condense1(sequence) {
	// assume the sequence is dirty to begin with and requires at least one
	// iteration to check for numbers next to each other that should be condensed
	let isDirty = true

	while (isDirty) {
		// assume this will be a clean unchanged iteration with no condenses
		// until we see two numbers next to each other that are a match
		isDirty = false

		let nextSequence = ""
		for (let i = 0; i < sequence.length - 1; i++) {
			let c1 = sequence.charAt(i)
			let c2 = sequence.charAt(i + 1)
			if (c1 !== c2) {
				nextSequence += c1
			} else {
				isDirty = true
				i++
			}
		}

		// account for the last character
		if (sequence.charAt(sequence.length - 2) !== sequence.charAt(sequence.length - 1)) {
			nextSequence += sequence.charAt(sequence.length - 1)
		}

		sequence = nextSequence
	}

	return sequence
}

console.log(condense1("45322367552"))