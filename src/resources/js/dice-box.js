import DiceBox from "@3d-dice/dice-box";

let Box = new DiceBox({
    assetPath: "/assets/",
    container: "#dice-box",
    offscreen: true,
    scale: 20,
    throwForce: 2,
    gravity: 1,
    mass: 1,
    spinForce: 3,
});

Box.init()

const button = document.getElementById("dice_roll");
button.addEventListener("click", (e) => {
    Box.roll("2d6")
});