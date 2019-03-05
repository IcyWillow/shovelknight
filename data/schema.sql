DROP SCHEMA IF EXISTS ShovelKnight;

CREATE SCHEMA ShovelKnight;
use ShovelKnight;

create table gamecharacter (
   id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   name VARCHAR(64) NOT NULL,
   picture_url VARCHAR(255),
   weapon VARCHAR(64),
   description VARCHAR(4000) NOT NULL,
   statement VARCHAR(255) NOT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


INSERT INTO gamecharacter (name, picture_url, weapon, description, statement) VALUES
  (
    'Shovel Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/b/b8/Shovel_Knight_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211211',
    'Shovel Blade', 
    'A practitioner of the ancient code of Shovelry, Shovel Knight can do almost anything with his signature weapon: the Shovel Blade. His ingenuity and quick thinking have won him many battles, even though his stature is small! Always honest and helpful, Shovel Knight lives by the creed of Shovelry: Slash Mercilessly and Dig Tirelessly!',
    '"Show yourself, Plague Knight! Your trickery will not stop me!"'
  ),
  (
    'Specter Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/2/25/Specter_Knight_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211532',
    'Scythe', 
    'In life, Specter Knight was a cruel and cunning warrior. And although his blood is now icy cold, he is no less formidable as a phantasm. The most begrudgingly loyal knight of the Order, Specter Knight follows the Enchantress only because she is capable of magically extending his undeath. Clutching a grim Scythe in his shriveled claws, Specter Knight commands his weapon with uncommon cunning... and his next target is Shovel Knight.',
    '"Heh heh heh... The Enchantress is just full of surprises. She granted me new life... SO THAT I MAY TAKE YOURS!"'
  ), 
  (
    'King Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/7/75/King_Knight_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211431',
    'Scepter', 
    'King Knight isn’t a king, he is a king-themed knight. But that doesn’t stop him from making decrees! As the lord defender of Pridemoor Keep, he commands a formidable army of minions. Experienced with repelling invaders who dare try topple his malevolent monarchy, King Knight is a master of single combat. And because he’s dressed to the nines at almost all times, he’s always ready for a brutal coronation!',
    '"Oh, but youre mistaken. The Enchantress saw me for my fabulously regal self, and now all bow before me!"'),
  (
    'Black Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/d/d9/Black_Knight_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211329',
    'Shovel Blade', 
    'As the Yin to Shovel Knight’s Yang, the Black Knight calls nobody master. Clad in obsidian armor, he hounds Shovel Knight to the ends of the Earth, spoiling for a battle. The Black Knight’s skill with the Shovel Blade rivals that of Shovel Knight, or so the Black Knight hopes to prove! While Shovel Knight is confused as to why he has this mysteriously relentless doppelganger, no number of humiliating defeats by Shovel Knight could dampen the Black Knight’s spirit: he will always rise up to fight again!',
    '"I knew you’d show your face sooner or later. The cerulean coward! Turn back, Shovel Knight! There’s nothing here for you anymore."'),
  (
    'Plague Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/0/09/Plague_Knight_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211615',
    'Bombs', 
    'Sometimes, the bomb is mightier than the sword. Deep in the recesses of his alchemical lab, Plague Knight perfects concoctions both poisonous and explosive. Toxin, disease, and death are his playgrounds. Even his comrades give Plague Knight a wide berth, because he spreads more than just the common cold. With an array of mysterious and magical bottles at his side, Plague Knight could be considered the black sheep of The Order of No Quarter.',
    '"I dont have time to play around with you, kid!"'),
     (
    'Reize Seatlan', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/0/0f/Reize.png/revision/latest/scale-to-width-down/200?cb=20140618155736',
    'Crystal Boomerangs', 
    'A group of evil knights is terrorizing the countryside? Reize Seatlan is on the scene! This plucky young adventurer travels the land, helping people in need and following his own invented Knight’s Vows. But which of these knights are good, and which ones are bad? Reize is a bit naive but always well-intentioned. How will his twin crystal boomerangs fare against a Shovel Blade?',
    '"You gonna use that shovel to BURY INNOCENT PEOPLE? Your reign of terror ends here!"'),
    (
    'Baz Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/f/f9/Zubaz.png/revision/latest?cb=20140618161620',
    'Rope and Lightning', 
    'The storm is coming... With a fearsome rope whip and the toughest-looking armor around, one might think that the traveling warrior Baz would be a shoe-in to join up with the Order of No Quarter. Imagine his surprise when he was rejected! He now roams the land, taking out his anger on passersby. Could he ever prove himself strong enough to earn the title of "Baz Knight"?',
    '"Now theyll never let me into the Order! Never ever ever! WAHHHHHHHHH!"'
    ),
       (
     'Treasure Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/5/5b/Treasure_Knight_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211652',
    '	Grapple Anchor', 
    'Towering over most of the Order of No Quarter, Treasure Knight is a tidal terror. A loner by nature, he rules the ocean as captain of the Iron Whale, a prototype underwater vessel. With his retractable anchor cannon and impermeable diving suit, he is at home on the seafloor, where he spends his days hunting down ancient relics. Just keep your hands off his hard-earned lucre... or you’ll find yourself floating home!',
    '"My gems... My vessel... My ocean. Your very presence tarnishes."'
    ),
       (
    'Mole Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/a/af/Mole_Knight_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211712',
    'Claws', 
    'The shovel may rule the confines of man-made gardens, but in the wild, the titan of tunneling is the mole! Mole Knight embraces this truth wholeheartedly. With his modified drop-forged armored claws, he mockingly tears through the earth with brute strength! Mole Knight calls the subterranean Lost City his home... an ancient abandoned metropolis. Shovel Knight must pass through the Lost City, but chances are slim he won’t be challenged to see who is truly the master of digging.',
    '"Youve gotta be kidding me. YOURE the demolitions expert? Youre a day late! Dont just stand there! Start blasting! Hop to it!"'
    ),
       (
    'Shield Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/4/40/Shield_Knight_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211257',
    'Asymmetrical Shields', 
    'Often, the best offense is a good defense, and Shield Knight knows it. Wielding a pair of Asymmetrical Shields, she deflects both melee and projectile attacks easily before getting into range and crushing her foes! For years, Shield Knight and Shovel Knight were inseparable partners in adventuring; with their expert use of unconventional weapons, they worked as one. Now, Shield Knight’s fate is unknown, but Shovel Knight’s goal is clear: he must journey to find Shield Knight, his lost beloved.',
    '"You knew I was still there, even though it seemed hopeless. You never gave up on me!"'
    ),
      (
    'The Enchantress', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/7/71/The_Enchantress_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211400',
    'Dark Magic', 
    'Of all the monsters roaming Shovel Knight’s world, none are as dangerous as the Enchantress. Cold, brilliant, and pulsing with vile power, the Enchantress is a preternatural force. Her Order of No Quarter carries out her will with ruthless might, although her origins remain shrouded in mystery. With a loyal army under her command, she is more than a match for a solitary knight with a lowly shovel... or so she assumes!',
    '"Who dares to intrude on my tower?"'
    ),
         (
    'Phantom Striker', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/8/89/Mister_bolt.png/revision/latest/scale-to-width-down/300?cb=20140618162331',
    'Fleuret', 
    'A lone warrior, Phantom Striker appears to those that he deems worthy of challenging him. Light on his feet and wielding a fencing foil, this enigmatic fighter also controls the power of lightning! Always in search of an honorable battle, Phantom Striker may reward those who fare well against his cyclonic charge.',
    '"We meet today, on the field of battle. We have both defeated many knights, and traveled far. Today we fight."'
    ),
          (
    'Propeller Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/2/29/Propeller_Knight_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211840',
    'Rapier', 
    'This aerodynamic ace commands the Enchantress flying machine with the cocksure attitude of a sky pirate! With his Heli-Helmet, he can zoom short distances with ease. Shovel Knight encounters Propeller Knight on top of the aircraft as it zooms through the sky; earth fights against air in a true battle of elements!',
    '"All business, no pleasure, such a shame. Very well, then! En garde!"'
    ),
       (
    'Tinker Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/f/fb/Tinker_Knight_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211816',
    'Wrench', 
    'Some knights love rushing into the glory of battle, ready to crush the skulls of their enemies! Tinker Knight is not one of those knights. He does his fighting before the battle begins, laboring on diabolical devices that do his work for him. The wrench is the tool of his trade, doubling as an engineering device and a melee weapon. Some are quick to dismiss Tinker Knight’s lethality... usually just before falling victim to one of his mechanical monstrosities!',
    '"Tools of war can force a kind of peace, but I think our rule should be fair and just. None but fools would break things and not rush to fix them."'
    ),
        (
    'Polar Knight', 
    'https://vignette.wikia.nocookie.net/shovelknight/images/8/8c/Polar_Knight_Treasure_Trove.png/revision/latest/scale-to-width-down/300?cb=20180901211742',
    'Snow Shovel', 
    'Titanic and terrible, Polar Knight guards the stranded ship in the frozen south. A silent giant wielding a two-handled snow shovel, he is the largest and most brutish of the Order of No Quarter. Some time in the past, Shovel Knight and Polar Knight have crossed Shovels before...',
    '"Hmph! No more words. The bitter cold will claim you."'
    );

    /* LoginTable */
  create table user ( 
  id int not null primary key auto_increment, 
  username varchar(50), 
  password varchar(200));

  INSERT INTO user (username, password) VALUES ('admin', '$2y$10$n5UfhEJV5NqU710GsIZ.QufXz0Ty4tq.rYgxFJUGmhpXZY/EzkMCC');

    /* TableBetween */
    create table user_gamecharacter (
      id int primary key not null auto_increment,
       user_id int, gamecharacter_id int, 
       foreign key (user_id) references user(id) on delete cascade, 
       foreign key (gamecharacter_id) references gamecharacter(id) on delete cascade);


INSERT INTO user_gamecharacter (user_id, gamecharacter_id) VALUES
  (
    1,
    1
  ),
  (
    1,
    2
  ),
  (
    1,
    3
  ),
  (
    1,
    4
  ),
  (
    1,
    5
  ),
  (
    1,
    6
  ),
  (
    1,
    7
  ),
  (
    1,
    8
  ),
   (
    1,
    9
  ),
   (
    1,
    10
  ),
   (
    1,
    11
  ),
   (
    1,
    12
  ),
   (
    1,
    13
  ),
   (
    1,
    14
  ),
     (
    1,
    15
  );


/*
INSERT INTO gamecharacter (name, picture_url, weapon, description, statement) VALUES 
     (
    '', 
    '',
    '', 
    '',
    '""'
    );
*/




