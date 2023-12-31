# Generated by Selenium IDE
import pytest
import time
import json
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support import expected_conditions
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities

class TestLogin():
  def setup_method(self, method):
    self.driver = webdriver.Chrome()
    self.vars = {}
  
  def teardown_method(self, method):
    self.driver.quit()
  
  def test_login(self):
    self.driver.get("http://localhost:63342/SAE301/PHP/Controleur/Accueil/Accueil.php?_ijt=v8m9t4uhj8l1ircl9dvmves0hc&_ij_reload=RELOAD_ON_SAVE")
    self.driver.set_window_size(1536, 824)
    self.driver.find_element(By.ID, "id").click()
    self.driver.find_element(By.ID, "id").send_keys("AdminProf@gmail.com")
    self.driver.find_element(By.ID, "mdp").click()
    self.driver.find_element(By.ID, "mdp").send_keys("Admin")
    self.driver.find_element(By.CSS_SELECTOR, "label:nth-child(1)").click()
    self.driver.find_element(By.ID, "mdp").click()
    self.driver.find_element(By.CSS_SELECTOR, ".submit").click()
    self.driver.find_element(By.CSS_SELECTOR, ".contenu").click()
  
