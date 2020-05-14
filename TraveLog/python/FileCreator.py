import json
import sys

first_arg = sys.argv[1]

def main(word1=first_arg):
    with open(word1, 'w', encoding='utf-8') as f:
        json.dump({"Data":[]}, f, ensure_ascii=False, indent=4)

if __name__ == "__main__":
    main()