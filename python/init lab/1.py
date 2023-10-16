n = input("Enter natural number: ")

try:
    n = int(n)
    if n < 0:
        raise ValueError("Number must be natural", n)
except ValueError:
    print("Your number is not natural")


tr = [[], []]

for i in range(-1, n):
    tr[i % 2] = [1]
    index = (i + 1) % 2
    for ind in range(1, len(tr[index])):
        tr[i % 2].append(tr[index][ind - 1] + tr[index][ind])
    tr[i % 2].append(1)
    print(*tr[i % 2])
        
