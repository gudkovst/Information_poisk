import string

# get 2 alphabets: lower and upper
def get_alphabet(lang: string) -> (list, list):
    match lang:
        case "rus":
            lower = [chr(code) for code in range(ord('а'), (ord('я') + 1))]
            upper = [chr(code) for code in range(ord('А'), (ord('Я') + 1))]
        case "eng":
            lower = list(string.ascii_lowercase)
            upper = list(string.ascii_uppercase)
    return (lower, upper)


file_in = input("Enter name of file with plane text:\n")
file_out = input("Enter name of result file:\n")
shift = input("Enter value of shift:\n")
lang = input("Choose language [rus, eng]:\n")

try:
    file_in = open(file_in, "r", encoding="utf-8")
    text = file_in.read()
    file_in.close()
    file_out = open(file_out, "w", encoding="utf-8")
    shift = int(shift)
    if lang not in ["rus", "eng"]:
        raise ValueError("Language can be rus or eng", lang)
except Exception as err:
    print(f"Exception: {type(err)}: {err.args}")


lower, upper = get_alphabet(lang)
for s in text:
    if s in lower:
        file_out.write(lower[(lower.index(s) + shift) % len(lower)])
    elif s in upper:
        file_out.write(upper[(upper.index(s) + shift) % len(upper)])
    else:
        file_out.write(s)

file_out.close()
