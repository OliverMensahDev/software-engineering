const dc = [
    { name: 'batman', power: 100 },
    { name: 'superman', power: 90 },
    { name: 'greenarrow', power: 70 },
    { name: 'greenlantern', power: 70 },
]

const heroNames = dc.map(x => x.name)
console.log(heroNames)

const heroesWithPower70 = dc.filter(x => x.power === 70)
console.log(heroesWithPower70)

const singleHeroWithPower90 = dc.find(x => x.power === 90)
console.log(singleHeroWithPower90.name)

const mostPowerfull = dc.reduce((a, b) => (a.power > b.power ? a : b))
console.log(mostPowerfull)
  
const includesGreenArrow = dc.map(x => x.name).includes('greenarrow')
console.log(includesGreenArrow)