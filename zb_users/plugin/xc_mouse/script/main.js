class RollCounterRange {
	constructor(id) {
		this.el = document.querySelector(id);
		this.srValue = null;
		this.fill = null;
		this.digitCols = null;
		this.lastDigits = "";
		this.rollDuration = 0; 
		this.trans09 = false;

		if (this.el) {
			this.buildSlider();
			this.el.addEventListener("input",this.changeValue.bind(this));
		}
	}
	buildSlider() {
		let rangeWrap = document.createElement("div");
		rangeWrap.className = "range";
		this.el.parentElement.insertBefore(rangeWrap,this.el);

		let rangeInput = document.createElement("span");
		rangeInput.className = "range__input";
		rangeWrap.appendChild(rangeInput);

		let rangeFill = document.createElement("span");
		rangeFill.className = "range__input-fill";
		rangeInput.appendChild(this.el);
		rangeInput.appendChild(rangeFill);

		let counter = document.createElement("span");
		counter.className = "range__counter";
		rangeWrap.appendChild(counter);

		let srValue = document.createElement("span");
		srValue.className = "range__counter-sr";
		srValue.textContent = "0";
		counter.appendChild(srValue);

		for (let D of this.el.max.split("")) {
			let digitCol = document.createElement("span");
			digitCol.className = "range__counter-column";
			digitCol.setAttribute("aria-hidden","true");
			counter.appendChild(digitCol);

			for (let d = 0; d <= 11; ++d) {
				let digit = document.createElement("span");
				digit.className = "range__counter-digit";

				if (d > 0)
					digit.textContent = d == 11 ? 0 : `${d - 1}`;

				digitCol.appendChild(digit);
			}
		}

		this.srValue = srValue;
		this.fill = rangeFill;
		this.digitCols = counter.querySelectorAll(".range__counter-column");
		this.lastDigits = this.el.value;

		while (this.lastDigits.length < this.digitCols.length)
			this.lastDigits = " " + this.lastDigits;

		this.changeValue();

		let colCS = window.getComputedStyle(this.digitCols[0]),
			transDur = colCS.getPropertyValue("transition-duration"),
			msLabelPos = transDur.indexOf("ms"),
			sLabelPos = transDur.indexOf("s");

		if (msLabelPos > -1)
			this.rollDuration = transDur.substr(0,msLabelPos);
		else if (sLabelPos > -1)
			this.rollDuration = transDur.substr(0,sLabelPos) * 1e3;
	}
	changeValue() {
		if (+this.el.value > this.el.max)
			this.el.value = this.el.max;

		else if (+this.el.value < this.el.min)
			this.el.value = this.el.min;

		if (this.srValue)
			this.srValue.textContent = this.el.value;

		if (this.fill) {
			let pct = this.el.value / this.el.max,
				fillWidth = pct * 100,
				thumbEm = 1 - pct;

			this.fill.style.width = `calc(${fillWidth}% + ${thumbEm}em)`;
		}
		
		if (this.digitCols) {
			let rangeVal = this.el.value;

			while (rangeVal.length < this.digitCols.length)
				rangeVal = " " + rangeVal;

			let diffsFromLast = [];
			if (this.lastDigits) {
				rangeVal.split("").forEach((r,i) => {
					let diff = +r - this.lastDigits[i];
					diffsFromLast.push(diff);
				});
			}

			this.trans09 = false;
			
			this.lastDigits = rangeVal;
		}
	}
}

window.addEventListener("DOMContentLoaded",() => {
	range1 = new RollCounterRange("#ra1");
    range2 = new RollCounterRange("#ra2");
    range3 = new RollCounterRange("#ra3");
    range4 = new RollCounterRange("#ra4");
});