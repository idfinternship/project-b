from bs4 import BeautifulSoup
from selenium import webdriver
import os





def main():
    url='https://www.novaturas.lt/paieska/index/step1/searchFromSuggest?sort=region_asc'
    driver = webdriver.Chrome("/usr/bin/chromedriver")
    driver.get(url)
    soup = BeautifulSoup(driver.page_source, 'html.parser')
    driver.quit()
    items = soup.findAll(class_='btn btn-round btn-red')
    for i in range(0,len(items)):
        print(items[i].attrs['href'],end=' ')



if __name__ == "__main__":
    main()