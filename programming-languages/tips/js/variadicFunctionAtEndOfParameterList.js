function team(coach, captain, ...players) {
    console.log(`${captain} (captain)`);
    for (let player of players) {
      console.log(player);
    }
    console.log(`squad coached by ${coach}`);
}
team('Luis Enrique', 'Xavi Hernández', 'Marc-André ter Stegen', 'Martín Montoya', 'Gerard Piqué')