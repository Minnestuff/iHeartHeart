import pandas as pd
import matplotlib.pyplot as plt
import statsmodels.formula.api as smf

data = pd.read_csv('data.csv', index_col=0)
data.head()

fig, axs = plt.subplots(1, 1)
data.plot(kind='scatter', x='Heart', y='BPM', ax=axs[0], figsize=(16, 8))

lm = smf.ols(formula='Sales ~ TV', data=data).fit()
lm.params
