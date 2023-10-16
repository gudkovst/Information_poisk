import sys
brackets = ['(', ')']

input_text = input("Enter bracket sequence or name of file(which not begin bracket):\n")

if input_text[0] in brackets:
    seq = input_text
else:
    file = open(input_text, "r")
    seq = file.read()
    file.close()

k = 0
for s in seq:
    if s not in brackets:
        print("Incorrect sequence: unnecessary symbol")
        sys.exit()
    if s == '(':
        k += 1
    elif s == ')':
        k -= 1
        if k < 0:
            print("Incorrect sequence")
            sys.exit()
if k == 0:
    print("Correct sequence")
else:
    print("Incorrect sequence")
