from __future__ import print_function
import numpy as np
import statsmodels.api as sm
import matplotlib.pyplot as plt
from statsmodels.sandbox.regression.predstd import wls_prediction_std
import pandas as pd

data = pd.read_csv('data.csv')
x = list(range(1, 1801))
y = data["Heart Beat"].values.tolist()
plt.scatter(x, y)
plt.show()
