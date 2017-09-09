package main

import (
	"fmt"
	"strconv"
)

func main() {
	for i := 4; i >= 0; i-- {
		str := strconv.Itoa(i)
		fmt.Print(str + str)
		for j := i; j >= 0; j-- {
			fmt.Print(i + 2)
		}
		fmt.Println("")
	}
}
