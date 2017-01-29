import pandas as pd
import matplotlib.pyplot as plt
import statsmodels.formula.api as smf

data = pd.read_csv('data.csv', index_col=0)
data.head()

#fig, axs = plt.subplots(1, 1)
#data.plot(kind='scatter', x='Heart', y='BPM', ax=axs[0], figsize=(16, 8))


df = DataFrame(rand(50, 4), columns=['a', 'b', 'c', 'd'])
df.plot(kind='scatter', x='a', y='b');

lm = smf.ols(formula='a ~ b', data=data).fit()
lm.params
