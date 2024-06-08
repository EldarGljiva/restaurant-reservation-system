import { Builder, By, until, WebDriver } from "selenium-webdriver";
import { createDriver, quitDriver } from "../core/config/driver-setup";
import { HomePage } from "../core/page-objects/home-page";
import { readFileSync } from "fs";
import * as path from "path";

const dataFilePath = path.resolve(__dirname, "../core/data/data.json");
const testData = JSON.parse(readFileSync(dataFilePath, "utf8"));

let driver: WebDriver;
let homePage: HomePage;

beforeAll(async () => {
  driver = await createDriver(testData.url.home_page);
  homePage = new HomePage(driver);
}, 20000);

test("Product Details", async () => {
  await homePage.enterProductPage();
  await driver.sleep(2000);
});

afterAll(async () => {
  await driver.sleep(2000); // Add a delay before quitting the driver
  await quitDriver(driver);
}, 10000);
