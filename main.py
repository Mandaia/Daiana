import turtle
import random

tr = turtle.Turtle()

turtle.Screen().bgcolor("violet")

def drawMan(x):
    guess = x
    if guess == 1:
        # draw head
        tr.color('green')
        tr.goto(-74, 140)
        tr.pendown()
        tr.right(90)
        tr.circle(15, None, 100)
        tr.penup()

    elif guess == 2:
        # draw torso
        tr.color('red')
        tr.goto(-74, 140)
        tr.pendown()
        tr.left(90)
        tr.penup()
        tr.forward(30)
        tr.pendown()
        tr.forward(40)
        tr.right(180)
        tr.forward(30)
        tr.penup()
    elif guess == 3:
        # draw first arm
        tr.color('red')
        tr.goto(-74, 100)
        tr.pendown()
        tr.left(55)
        tr.forward(45)
        tr.right(180)
        tr.forward(45)
        tr.penup()
    elif guess == 4:
        # draw second arm
        tr.color('red')
        tr.goto(-74, 100)
        tr.pendown()
        tr.left(70)
        tr.forward(45)
        tr.right(180)
        tr.forward(45)
        tr.penup()
    elif guess == 5:
        # draw first leg
        tr.color('red')
        tr.goto(-74, 100)
        tr.pendown()
        tr.left(55)
        tr.forward(30)
        tr.right(30)
        tr.forward(60)
        tr.right(180)
        tr.forward(60)
        tr.penup()
    elif guess == 6:
        # draw second leg
        tr.color('red')
        tr.goto(-74, 70)
        tr.pendown()
        tr.right(120)
        tr.forward(60)
        tr.penup()


# initialize turtle
tr.hideturtle()
tr.speed(0)
tr.pensize(2)

wordbank = ['arhanghel', 'bormasina', 'bar', 'buncar',
            'coasta', 'corona', 'duminica', 'dwarves',
            'echipa', 'exod', 'furnizor', 'fixat', 'galaxie',
            'inteligent', 'jucarie', 'kilobyte', 'megahertz',
            'oxigen', 'pitic', 'quiz', 'rugaciune', 'schizofrenie',
            'temperament', 'unghie', 'vodka', 'whiskey', 'zombie']

bored = False
while not bored:

    # draw gallows
    tr.home()
    tr.pendown()
    tr.left(90)
    tr.forward(175)
    tr.left(90)
    tr.forward(74)
    tr.left(90)
    tr.forward(35)
    tr.penup()
    tr.goto(-135, -35)

    word = random.choice(wordbank)

    for i in word:
        tr.write('_ ', True, font=("Courier", 14, "normal"))

    correct = []
    wrong = 0
    terminate = False
    while wrong < 6 and not terminate:
        letter = turtle.textinput('Hangman', 'Guess a letter:')
        tr.goto(-135, -35)
        if letter not in correct:
            for i in word:
                if i == letter:
                    tr.write(letter.upper() + ' ', True, font=("Courier", 14, "normal"))
                    correct += letter
                else:
                    tr.write('_ ', True, font=("Courier", 14, "normal"))
        if letter not in word:
            wrong += 1
            drawMan(wrong)
        if wrong == 6:
            tr.goto(-135, -35)
            for i in word:
                if i in correct:
                    tr.write('_ ', True, font=("Courier", 14, "normal"))
                else:
                    tr.write(i.upper() + ' ', True, font=("Courier", 14, "normal"))
            tr.goto(-74, -60)
            tr.write('Sorry, you lose!', False, align='center', font=("Courier", 14, "normal"))
        if len(correct) == len(word):
            tr.goto(-74, -60)
            tr.write('Congratulations!', False, align='center', font=("Courier", 14, "normal"))
            terminate = True

    # play again?
    response = turtle.textinput('Hangman', 'Would you like to play again? (y or n): ')
    while response != 'y' and response != 'n' and response != 'Y' and response != 'N':
        response = turtle.textinput('Hangman', 'Please enter "y" or "n": ')
    if response == 'y' or 'Y':
        tr.clear()
    elif response == 'n' or 'N':
        tr.clear()
        tr.home()
        tr.write('Thanks for playing!', False, align='center', font=("Courier", 25, "normal"))
        bored = True