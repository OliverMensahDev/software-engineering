import {Employee} from "./employee";

export class Company {
	hire(...names) {
		this.employees = names.map(
			n => new Employee(n));
	}
	doWork() {
		return [for (e of this.employees) e.doWork()];
	}
}