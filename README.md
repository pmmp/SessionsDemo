# SessionsDemo

Demo plugin showing how to manage plugin player data at runtime (without custom Player classes)

## Background
For far too long I've sat back and watched people misuse `PlayerCreationEvent` for things it wasn't designed for, such as:

- Tracking extra data on the player (e.g. kill count)
- Adding extra API methods to the player

Custom player classes are one of the worst possible solutions to this problem, so this plugin aims to show a way to track plugin-player data in a way that is:

- Extremely simple
- Easy to read and write
- Multiple-plugin friendly (no more fighting for your player class to be registered)
- Almost impossible to break

## Can I copy this code?
I hope someone does. If it stops one person from abusing `PlayerCreationEvent`...
